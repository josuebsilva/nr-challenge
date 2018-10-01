<?php 
    namespace App\Http\Controllers;

    use App\Bidding\BiddingCamara;
    use App\Bidding;
    use App\Category;
    use App\DBA\DataDelegator;

    class IndexController extends Controller{
        
        function index(){
            return view('welcome');
        }

        function extract(){
            $bidding  = new BiddingCamara();
            $response = $bidding->extract();
            
            if($response != true)
                return response()->json(["message" => "error", "error" => $response]);

            return response()->json(["message" => "ok", ]);
        }

        function getBiddings(){
            $categories = DataDelegator::getAll(Category::class);
            return view('bidding')->with(["categories" => $categories]);
        }
    }
?>