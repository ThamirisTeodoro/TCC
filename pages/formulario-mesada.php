<link rel="stylesheet" href="pages/style.css" />

<main class="tela-principal">

<section class='conteudos'>
</section>

    <h1>Questionario</h1>

    <article class='centro' id='instrucoes'>
        Leia a questão e clique na resposta correta
    </article>

    <article class='questoes'>
        
        <header class='questao'>
            <span id='numQuestao'></span>
            <h2 id='pergunta'></h2>
        </header>

        <div class='corpo'>
            <ol type='A' id='alternativas'>
                <li id='a' value='1A' class='respostas' onClick='verificarSeAcertou(this, this)'></li>
                <li id='b' value='1B' class='respostas' onClick='verificarSeAcertou(this, this)'></li>
                <li id='c' value='1C' class='respostas' onClick='verificarSeAcertou(this, this)'></li>
            </ol>
        </div>
    </article>
    
    <article id='aviso'>Questão <span id='numero'></span> de <span id='total'></span></article>
 

</main>
<script src="pages/jsPages/formulario-mesada.js"></script>
