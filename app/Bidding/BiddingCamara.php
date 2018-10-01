<?php 
namespace App\Bidding;

use App\Bidding\Interfaces\IBidding;
use App\WCrawler\WCrawler;
use App\DBA\DataDelegator;
use App\Category;
use App\Bidding;

class BiddingCamara implements IBidding{
    private $baseUrl = 'http://www2.camara.leg.br/transparencia/licitacoes-e-contratos/editais';
    private $crawler;

    function __construct(){
        $this->crawler = WCrawler::instance($this->baseUrl);
    }

    public function extract(){
        try{
            $content = $this->crawler->getData();
            $uls     = $this->crawler->find($content, "ul");
            foreach($uls as $ul){
                if($ul->getAttribute("class") == "listaMarcada"){
                    $links = $ul->getElementsByTagName("a");
                    foreach($links as $link){
                        $this->accessCategory($link->getAttribute("href"));
                    }
                }
            }

            return true;
        }catch(\Error $error){
            return $error->getMessage();
        }
    }

    private function accessCategory($url){
        $this->crawler->setTarget($url);
        $content  = $this->crawler->getData();
        $spanList =  $this->crawler->find($content, "span");
        //$date  =  $crawler->filter($content, '/<p>Última atualização: (.*?)<\/p>/');
        $category = false;
        foreach($spanList as $span){
            $id = $span->getAttribute("id");
            if(preg_match('/\bparent-fieldname-title\b/', $id)){
                $title_category = $span->nodeValue;
                if(!is_null($title_category))
                    $category = DataDelegator::saveIfNoExist(Category::class, ['title' => trim($title_category)], ['title' => trim($title_category)]);
            }
        }

        if($category != false){
            $tables =  $this->crawler->find($content, "table");
            foreach($tables as $table){
                $trs  =  $table->getElementsByTagName("tr");
                foreach($trs as $tr){
                    $tds = $tr->getElementsByTagName("td");
                    
                    if($tds[0] != null && $tds[1] != null){
                        $number =  $tds[0]->nodeValue;
                        $number = str_replace("/","", $number);
                        $file   = null; 
                        if(preg_match('/^[0-9]*$/', $number)){
                            $links = $tds[0]->getElementsByTagName("a");
                            if(count($links) > 0){
                                $file  = null;
                                foreach($links as $link){
                                    if($link != null)
                                        $file = $link->getAttribute("href");
                                }

                            }

                            $description = $tds[1]->nodeValue;
                            DataDelegator::saveIfNoExist(Bidding::class, [
                                'number' => $number,
                                "category_id" => $category->id,
                                'description' => $description,
                                'file' => $file
                            ], ['number' => $number]);
                        }
                        
                    }
                }
            }
        }
    }
}