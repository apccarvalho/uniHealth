from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import time

servico = Service(r"C:\Program Files\WebDrivers\chromedriver-win64\chromedriver.exe")  # Ajuste esse caminho se necessário
driver = webdriver.Chrome(service=servico)

driver.get("http://localhost/uniHealth/evolucao.php?fun=cadastrarEvol&id=1")
driver.maximize_window()
time.sleep(2) 

driver.find_element(By.NAME, "resumo").send_keys("Sessão focada em estratégias de enfrentamento da ansiedade.")
time.sleep(2)

driver.find_element(By.NAME, "enviar").click()
time.sleep(5)

driver.quit()
