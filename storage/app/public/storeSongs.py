# Song path name: artistnospace_songnamenospace.mp3
# Image path name: artistnospace_songnamenospace.jpg
import os, shutil
import mysql.connector
mydb = mysql.connector.connect(host="localhost", user="root", password="33pMIEtPSbs923W7Mymi", database="supersong")
cursor = mydb.cursor()
formula = "INSERT INTO songs (title, imageUrl, filepath, artist) VALUES (%s, %s, %s, %s)"
for subdir in os.listdir("."):
	artistName = "" # artist that gets put in database
	if os.path.isdir(subdir):
		artistName += subdir
		artistName2 = artistName.replace(" ", "")
		for subdir2 in os.listdir(subdir):
			# these are directories not used
			filepath = os.path.join(subdir, subdir2) # filepath that gets put in database
			for file in os.listdir(os.path.join(subdir, subdir2)):
				filename = ""
				songpath = ""
				imagepath = ""
				if file.endswith(".mp3"): # this is an mp3 file
					# need to get names
					filename = file[:-4] # title that gets put in database
					filename2 = filename.replace(" ", "")
					newName = artistName2 + "_" + filename2
					songpath = os.path.join(filepath, file)
					shutil.copy(songpath, ".")
					os.rename(file, newName + ".mp3")
					if "Folder.jpg" in os.listdir(filepath):
						imagepath = os.path.join(filepath, "Folder.jpg")
						shutil.copy(imagepath, ".")
						os.rename("Folder.jpg", newName + ".jpg")
					else:
						imagepath = ""
					song = (filename, "/storage/" + newName + ".jpg", "/storage/" + newName + ".mp3", artistName)
					cursor.execute(formula, song)
mydb.commit()
				
