from selenium import webdriver
from selenium.webdriver.chrome.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
import time

servico = Service(r"C:\Program Files\WebDrivers\chromedriver-win64\chromedriver.exe")
driver = webdriver.Chrome(service=servico)

driver.get("http://localhost/uniHealth/plano.php?fun=cadastrarPlano&id=1")
driver.maximize_window()
time.sleep(2)

driver.find_element(By.NAME, "hipoteses").send_keys("Transtorno de ansiedade generalizada.")
time.sleep(1)

driver.find_element(By.NAME, "abordagem").send_keys("Terapia Cognitivo-Comportamental (TCC).")
time.sleep(1)

driver.find_element(By.NAME, "objetivos").send_keys("Reduzir sintomas de ansiedade e melhorar qualidade de vida.")
time.sleep(1)

driver.find_element(By.NAME, "enviar").click()
time.sleep(5)

driver.quit()