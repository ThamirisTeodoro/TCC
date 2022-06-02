let titulo = document.querySelector('h1')
let instrucoes = document.querySelector('#instrucoes')
let aviso = document.querySelector('#aviso')
//let respostaEsta = document.querySelector('#respostaEsta')
let pontos = 0 // pontos para o placar
let placar = 0 // placar

// PERGUNTA
let numQuestao = document.querySelector('#numQuestao')
let pergunta   = document.querySelector('#pergunta')

// ALTERNATIVAS
let a = document.querySelector('#a')
let b = document.querySelector('#b')
let c = document.querySelector('#c')

// article com a class questoes
let articleQuestoes = document.querySelector('.questoes')
// ol li com as alternativas
let alternativas = document.querySelector('#alternativas')

const q0 = {
    numQuestao   : 0,
    pergunta     : "Pergunta",
    alternativaA : "Alternativa A",
    alternativaB : "Alternativa B",
    alternativaC : "Alternativa C",
    correta      : "0",
}

const q1 = {
    numQuestao   : 1,
    pergunta     : "O que era a caixa de Zeca?",
    alternativaA : "Uma caixa mágica",
    alternativaB : "Um cofrinho",
    alternativaC : "Uma caixa de doces",
    correta      : "Um cofrinho",
}

const q2 = {
    numQuestao   : 2,
    pergunta     : "Para que serve um cofrinho?",
    alternativaA : "Para comprar doces",
    alternativaB : "Para gastar no fliperama",
    alternativaC : "Para guardar a mesada",
    correta      : "Para guardar a mesada",
}

const q3 = {
    numQuestao   : 3,
    pergunta     : "Oque é poupar?",
    alternativaA : "Poupar é economizar apenas no futuro",
    alternativaB : "Poupar é comprar apenas produtos baratos",
    alternativaC : "Poupar é economizar no presente para utilizar no futuro",
    correta      : "Poupar é economizar no presente para utilizar no futuro",
}

const q4 = {
    numQuestao   : 4,
    pergunta     : "Porque devemos investir?",
    alternativaA : "Para ter independencia financeira",
    alternativaB : "Para nao ter gastos",
    alternativaC : "Para ter lucro rapido",
    correta      : "Para ter independencia financeira",
}

const q5 = {
    numQuestao   : 5,
    pergunta     : "Porque devemos investir o quanto antes?",
    alternativaA : "Porque ganha mais",
    alternativaB : "Porque nao vale apena após meia idade",
    alternativaC : "Porque é uma ótima forma de garantir o futuro",
    correta      : "Porque é uma ótima forma de garantir o futuro",
}

// CONSTANTE COM UM ARRAY DE OBJETOS COM TODAS AS QUESTOES
const questoes = [q0, q1, q2, q3, q4, q5]

let numero = document.querySelector('#numero')
let total  = document.querySelector('#total')

numero.textContent = q1.numQuestao

let totalDeQuestoes = (questoes.length)-1
console.log("Total de questões " + totalDeQuestoes)
total.textContent = totalDeQuestoes

// MONTAR A 1a QUESTAO COMPLETA, para iniciar o Quiz
numQuestao.textContent = q1.numQuestao
pergunta.textContent   = q1.pergunta
a.textContent = q1.alternativaA
b.textContent = q1.alternativaB
c.textContent = q1.alternativaC

// CONFIGURAR O VALUE INICIAL DA 1a QUESTAO COMPLETA
a.setAttribute('value', '1A')
b.setAttribute('value', '1B')
c.setAttribute('value', '1C')

// PARA MONTAR AS PROXIMAS QUESTOES
function proximaQuestao(nQuestao) {
    numero.textContent = nQuestao
    numQuestao.textContent = questoes[nQuestao].numQuestao
    pergunta.textContent   = questoes[nQuestao].pergunta
    a.textContent = questoes[nQuestao].alternativaA
    b.textContent = questoes[nQuestao].alternativaB
    c.textContent = questoes[nQuestao].alternativaC
    a.setAttribute('value', nQuestao+'A')
    b.setAttribute('value', nQuestao+'B')
    c.setAttribute('value', nQuestao+'C')
}

function bloquearAlternativas() {
    a.classList.add('bloqueado')
    b.classList.add('bloqueado')
    c.classList.add('bloqueado')
}

function desbloquearAlternativas() {
    a.classList.remove('bloqueado')
    b.classList.remove('bloqueado')
    c.classList.remove('bloqueado')
}

function verificarSeAcertou(nQuestao, resposta) {

    let numeroDaQuestao = nQuestao.value
    console.log("Questão " + numeroDaQuestao)

    let respostaEscolhida = resposta.textContent
    //console.log("RespU " + respostaEscolhida)

    let certa = questoes[numeroDaQuestao].correta
    //console.log("RespC " + certa)

    if(respostaEscolhida == certa) {
        //console.log("Acertou")
        //respostaEsta.textContent = "Correta 😊"
        pontos += 10 // pontos = pontos + 10
    } else {
        //console.log("Errou!")
        //respostaEsta.textContent = "Errada 😢"
    }

    // atualizar placar
    placar = pontos
    instrucoes.textContent = "Pontos " + placar

    // bloquear a escolha de opcoes
    bloquearAlternativas()

    setTimeout(function() {
        //respostaEsta.textContent = '...'
        proxima = numeroDaQuestao+1

        if(proxima > totalDeQuestoes) {
            console.log('Fim do Jogo!')
            fimDoJogo()
        } else {
            proximaQuestao(proxima)
        }
    }, 250)
    desbloquearAlternativas()
}

function fimDoJogo() {
    instrucoes.textContent = "Fim de Jogo!"
    numQuestao.textContent = ""

    let pont = ''
    pontos == 0 ? pont = 'ponto' : pont = 'pontos'

    // condição de retorno bruta
    if(pontos == 0){
        pergunta.textContent   = "Resultado Ruim , Você conseguiu " + pontos + " " + pont
    } else if(pontos == 10) {
        pergunta.textContent   = "Infelizmente, Você conseguiu " + pontos + " " + pont
    } else if (pontos == 20) {
        pergunta.textContent   = "Precisa focar mais, Você conseguiu " + pontos + " " + pont
    } else if(pontos == 30) {
        pergunta.textContent   = "Muito bom, Você conseguiu " + pontos + " " + pont
    } else if (pontos > 30) {
        pergunta.textContent   = "Exelente, Você conseguiu " + pontos + " " + pont
    } else {
        aviso.textContent = "Você conseguiu segundo" + pontos + " " + pont
    }


    a.textContent = ""
    b.textContent = ""
    c.textContent = ""

    a.setAttribute('value', '0')
    b.setAttribute('value', '0')
    c.setAttribute('value', '0')

    // OCULTAR O ARTICLE DA QUESTAO

    setTimeout(function() {
        pontos = 0 // zerar placar
        location.reload();
    }, 5000)
}