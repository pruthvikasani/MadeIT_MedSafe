# -*- coding: utf-8 -*-
"""
Created on Tue Dec 19 16:57:00 2017

@author: Maitreya
"""
import cv2
import numpy as np

def grabcut_func(img1, img2):
	resized_img = cv2.resize(img1, (0, 0), fx=0.2, fy=0.2)
	resized_img1 = cv2.resize(img2, (0, 0), fx=0.2, fy=0.2)
	print ("Image1...")
	mask = np.zeros(resized_img.shape[:2],np.uint8)
	bgdModel = np.zeros((1,65),np.float64)
	fgdModel = np.zeros((1,65),np.float64)
	rect = (10,130,resized_img.shape[1]-20,resized_img.shape[0]-100)
	cv2.grabCut(resized_img,mask,rect,bgdModel,fgdModel,30,cv2.GC_INIT_WITH_RECT)
	mask2 = np.where((mask==2)|(mask==0),0,1).astype('uint8')
	resized_img = resized_img*mask2[:,:,np.newaxis]
	print ("Image1...")
	mask1 = np.zeros(resized_img1.shape[:2],np.uint8)
	bgdModel1 = np.zeros((1,65),np.float64)
	fgdModel1 = np.zeros((1,65),np.float64)
	rect1 = (10,130,resized_img1.shape[1]-20,resized_img1.shape[0]-100)
	cv2.grabCut(resized_img1,mask1,rect1,bgdModel1,fgdModel1,30,cv2.GC_INIT_WITH_RECT)
	mask21 = np.where((mask1==2)|(mask1==0),0,1).astype('uint8')
	resized_img1 = resized_img1*mask21[:,:,np.newaxis]
	return (resized_img, resized_img1)

def hisComparision(img1, img2):
	print ("Histogram Comparision Started...")
	hist1 = cv2.calcHist([img1],[0],None,[256],[0,256])
	hist2 = cv2.calcHist([img2], [0], None, [256], [0,256])
	print ("Histogram Comparision Completed...")
	return cv2.compareHist(hist1,hist2,cv2.HISTCMP_CORREL)

def featureMatching(img1, img2):
	print ("Feature Matching Started...")

	
	
	img1 = cv2.cvtColor(img1, cv2.COLOR_BGR2GRAY)
	img2 = cv2.cvtColor(img2, cv2.COLOR_BGR2GRAY)
	
	orb = cv2.ORB_create()
	
	kp1, des1 = orb.detectAndCompute(img1, None)
	kp2, des2 = orb.detectAndCompute(img2, None)
	
	bf = cv2.BFMatcher(cv2.NORM_HAMMING2, crossCheck = True)
	
	matches = bf.match(des1, des2);
	matches = sorted(matches, key = lambda x:x.distance)
	
	img3 = cv2.drawMatches(img1, kp1, img2, kp2, matches[:100], (0, 0, 255), flags = 2)
	cv2.imshow("img3", img3)
	cv2.waitKey(0)
	cv2.destroyAllWindows()
	print ("Feature Matching Completed...\nPrinting number of Matches...")
	return len(matches)
	
img1 = cv2.imread("C:\\Users\\hp\\Desktop\\MadeIT\\TEST\\P3.jpg")
img2 = cv2.imread("C:\\Users\\hp\\Desktop\\MadeIT\\TEST\\Z6.jpg")

#img1 = cv2.imread("C:\\Users\\Madhulika\\Documents\\GitHub\\OCR\\medicines\\P3.jpg")
#img2 = cv2.imread("C:\\Users\\Madhulika\\Documents\\GitHub\\OCR\\medicines\\Z5.jpg")
print ("Foreground Extraction Started...")
(img1, img2) = grabcut_func(img1, img2)
print("Foreground Extraction Complete...")


print (hisComparision(img1, img2))
print (featureMatching(img1, img2))