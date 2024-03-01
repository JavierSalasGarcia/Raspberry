import RPi.GPIO as GPIO
import time
import sys

# Establecer el modo de numeración de los pines
GPIO.setmode(GPIO.BOARD)
# Pin al que está conectado el LED
LED_PIN = 10
GPIO.setup(LED_PIN, GPIO.OUT)

def blink_led(times, delay=1):
    """
    Función para hacer parpadear un LED.
    
    :param times: Número de veces que el LED parpadeará.
    :param delay: Retardo entre encendido y apagado en segundos.
    """
    for _ in range(times):
        GPIO.output(LED_PIN, GPIO.HIGH)  # Encender el LED
        time.sleep(delay)                # Esperar
        GPIO.output(LED_PIN, GPIO.LOW)   # Apagar el LED
        time.sleep(delay)                # Esperar

if __name__ == "__main__":
    if len(sys.argv) != 2:
        print("Uso: python led2.py <n>")
        sys.exit(1)

    n = int(sys.argv[1])
    try:
        blink_led(n)
    finally:
        GPIO.cleanup()  # Limpiar los recursos utilizados
