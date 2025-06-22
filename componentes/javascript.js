function sair() {
    alert("Você saiu do sistema!");
    //Redireciona para a página de login
    window.location.href = "http://localhost/uniHealth/index.php";
}

function voltarMenuPrincipal() {
    window.location.href = "http://localhost/uniHealth/visao/menuPrincipal.php";
}

function voltarListaCadastros() {
    window.location.href = "http://localhost/uniHealth/pessoa.php?fun=listar";
}

function editarCadastro(id) {
    window.location.href = "http://localhost/uniHealth/pessoa.php?fun=alterar&id=" + id;
}

function editarHistorico(id) {
    window.location.href = "http://localhost/uniHealth/prontuario.php?fun=alterarPront&id=" + id;
}

function editarEvolucao(id) {
    window.location.href = "http://localhost/uniHealth/evolucao.php?fun=alterarEvol&id=" + id;
}

function editarPlano(id) {
    window.location.href = "http://localhost/uniHealth/plano.php?fun=alterarPlano&id=" + id;
}

function voltarProntuarioIndividual(id) {
    window.location.href = "http://localhost/unihealth/pessoa.php?fun=exibir&id=" + id;
}


function openTab(evt, tabId) {
  // Oculta todas as abas
  const tabContents = document.querySelectorAll('.tab-content');
  tabContents.forEach(tab => tab.classList.remove('active'));

  // Remove classe 'active' de todos os botões
  const tabButtons = document.querySelectorAll('.tab-button');
  tabButtons.forEach(button => button.classList.remove('active'));

  // Exibe a aba clicada
  document.getElementById(tabId).classList.add('active');
  evt.currentTarget.classList.add('active');
}


