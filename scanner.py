import cv2 as cv
from pyzbar import pyzbar
import imutils
from imutils.video import VideoStream
import time
import requests 

scannerId = input("Please enter the scanner ID: ")
while not scannerId.isdigit():
	scannerId = input("Scanner ID must be a number. Repeat.")

vs = VideoStream( usePiCamera = False ).start()
time.sleep(2.0)
lastValue = ""
lastDetectedTime = time.time()

while True:
	frame = vs.read()
	frame = imutils.resize(frame, width=400)
	barcodes = pyzbar.decode(frame)

	if len(barcodes) > 0:
		lastDetectedTime = time.time()
		# add light activation here
		for barcode in barcodes:
			data = barcode.data.decode("utf-8")
			if data != lastValue:
				# add second light here
				lastValue = data
				url = f"http://192.168.78.171:8000/api/scan/{data}/{scannerId}" #localhost or 192.168.78.171
				print( data )

				try: 
					response = requests.post(url)
					if response.status_code == 201:
						print(f"Sucessfully sent barcode {data}.")
						# light
					else:
						print(f"{response.status_code} - Failed to send barcode.")

				except requests.exceptions.RequestException as e:
					print(f"{e}") 
	else:
		if time.time() - lastDetectedTime >= 5:
			lastValue = ""
