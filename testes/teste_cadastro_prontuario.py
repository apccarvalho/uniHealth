from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import time

# Caminho do seu chromedriver
servico = Service(r"C:\Program Files\WebDrivers\chromedriver-win64\chromedriver.exe")  # Ajuste esse caminho se necessário
driver = webdriver.Chrome(service=servico)

driver.get("http://localhost/uniHealth/prontuario.php?fun=cadastrarPront")
driver.maximize_window()
time.sleep(2)

select_paciente = Select(driver.find_element(By.NAME, "paciente"))
select_paciente.select_by_index(1)
time.sleep(1)

select_estagiario = Select(driver.find_element(By.NAME, "estagiario"))
select_estagiario.select_by_index(2)
time.sleep(1)

select_supervisor = Select(driver.find_element(By.NAME, "supervisor"))
select_supervisor.select_by_index(3)
time.sleep(1)

driver.find_element(By.NAME, "queixaPrincipal").send_keys("Paciente relata insônia e ansiedade constante.")
time.sleep(1)

driver.find_element(By.NAME, "historicoFamiliar").send_keys("Mãe com histórico de depressão, pai alcoólatra.")
time.sleep(1)

driver.find_element(By.NAME, "enviar").click()

time.sleep(5)

driver.quit()
