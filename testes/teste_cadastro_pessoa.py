from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import time

# Caminho do seu chromedriver
servico = Service(r"C:\Program Files\WebDrivers\chromedriver-win64\chromedriver.exe")  # Ajuste esse caminho se necessário
driver = webdriver.Chrome(service=servico)

# 1. Acessar o formulário
driver.get("http://localhost/uniHealth/pessoa.php?fun=cadastrar")
driver.maximize_window()
time.sleep(1)

# 2. Preencher os campos
driver.find_element(By.NAME, "nome").send_keys("Maria da Silva")
driver.find_element(By.NAME, "cpf").send_keys("123.456.789-00")
driver.find_element(By.NAME, "dataNascimento").send_keys("01-01-1990")

# Selecionar opção no SELECT (gênero)
select_genero = Select(driver.find_element(By.NAME, "genero"))
select_genero.select_by_value("F")  # "Feminino"

driver.find_element(By.NAME, "telefone").send_keys("(11)91234-5678")
driver.find_element(By.NAME, "email").send_keys("maria@email.com")

driver.find_element(By.NAME, "rua").send_keys("Rua das Acácias")
driver.find_element(By.NAME, "numero").send_keys("123")
driver.find_element(By.NAME, "bairro").send_keys("Centro")
driver.find_element(By.NAME, "cidade").send_keys("São Paulo")

driver.find_element(By.NAME, "cartaoSus").send_keys("1234567891")
driver.find_element(By.NAME, "crp").send_keys("12345/SP")

# 3. Clicar no botão "Salvar"
driver.find_element(By.NAME, "enviar").click()

# 4. Aguardar e encerrar
time.sleep(7)
driver.quit()
