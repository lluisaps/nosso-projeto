<div class="footer bg-primary text-white" style="background-color: #2652a9 !important; margin-top: 0vh">
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="link-rodape itens-left">
                    <p><a href="{{ route('site.home') }}" class="text-white text-decoration-none">Home</a></p>
                    <p><a href="{{ route('site.perfil') }}" class="text-white text-decoration-none">Perfil</a></p>
                    <p><a href="{{ route('site.avaliacao') }}" class="text-white text-decoration-none">Avaliação</a></p>
                    <p><a href="{{ route('site.doc') }}" class="text-white text-decoration-none">Documentos</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="link-rodape itens-center">
                    <p>Eduarda Moreira</p>
                    <p>Lara Marcelino</p>
                    <p>Luisa Prado</p>
                    <p>Mariana Godoi</p>
                    <p>Nicole Salcedo</p>
                    <p>Victor Hugo</p>
                </div>
            </div>       
            <div class="col-lg-4 col-md-6 links-rodape">
             <a href="#seta"><img src="{{ asset('img/icons/seta.png') }}" alt="Seta"></a>
           </div>
        </div> 
        <div class="text-center p-3"><p>&copy; 2024 Verifica Ai. Todos os direitos reservados. | <a href="#contact" class="text-white text-decoration-none">Contato</a></p></div>
    
    <!-- </div> -->
</div>

<style>
    .itens-left{
        margin-top: 72px;
    }
    .links-rodape{
        margin-top: 115px;
    }
</style>