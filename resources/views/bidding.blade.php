<div style="text-align:left;">
    @if(count($categories))
        @foreach($categories as $category)
        <?php 
            $biddings = $category->biddings();
            $biddings = $biddings->get();
        ?>
            <h3 id="header-and-footer"><div>{{ $category->title }}</div></h3>
            @if(count($biddings))
                @foreach ($biddings as $bidding)
                    <div class="card" style="margin-bottom: 2px;">
                        <div class="card-body">
                            <h5 class="card-title">Número: {{ $bidding->number }}</h5>
                            <p class="card-text">{{ $bidding->description }}</p>
                        </div>
                        @if($bidding->file != null)
                            <div class="card-body">
                                <a href="{{ $bidding->file }}" class="card-link">Baixar arquivo</a>
                            </div>
                        @endif
                    </div>   
                @endforeach
            @else
                <div class="alert alert-warning" role="alert">
                    Sem informação
                </div>
            @endif
            <br>
        @endforeach
    @else
        <div class="alert alert-warning" role="alert">
            Nenhuma licitação encontrada
        </div>
    @endif
</div>