# -*- coding: utf-8 -*-
"""
Spyder Editor

This is a temporary script file.
"""
#!/usr/bin/env python
import cv2
import numpy as np

image_bgr= cv2.imread("C:\\Users\\hp\\Desktop\\MadeIT\\TEST\\Z5.jpg")
small = cv2.resize(image_bgr, (0,0), fx=0.2, fy=0.2)
#img2 = cv2.imread("C:\\Users\\hp\\Desktop\\MadeIT\\TEST\\Z6.jpg")

image_gray = cv2.cvtColor(small, cv2.COLOR_BGR2GRAY)
template = cv2.imread("C:\\Users\\hp\\Desktop\\MadeIT\\TEST\\pattern.jpg",0)
temp_res = cv2.resize(template, (0,0), fx=0.2, fy=0.2)

w, h = temp_res.shape[::-1]
res = cv2.matchTemplate(image_gray, temp_res ,cv2.TM_CCOEFF_NORMED)
#print len(res)
threshold = 0.5
loc = np.where(res >= threshold)
count = 0;
for pt in zip(*loc[::-1]):
    cv2.rectangle(small,pt,(pt[0]+w, pt[1]+h), (0,255,255), 2)
    count+=1
cv2.imshow('detected',small)
cv2.waitKey(0)
cv2.destroyAllWindows()
print (count)