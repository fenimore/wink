#Wink
A very simple flat file photo gallery

##Sorting
Galleries are indexed in reverse alphabetical order, so if album title is the date, the most recent will be on top.

##Uploads
Uploading through php can be a bit slow (this can be changed by configuring the server php init file). Using a FTP client might be much faster. I recommend [bimp](http://www.alessandrofrancesconi.it/projects/bimp/) for using gimp to compress images in batch. Upload a directory of photographs into the media folder, and it will appear on the index of galleries.

##Supported Extensions
PHP glob only reads file extensions in lower case, included is a bash script which automatically changes file extension.

```bash
for file in *.JPG; do
    mv "$file" "`basename $file .JPG`.jpg"
done
```

###TODO
- Errors reports
    - login/password
    - uploads
        - size
        - ext
    - delete & create
- Add pgn/gif support
- Genre/Subfolders
- htaugh
- Prev and Next should be larger buttons
- SELECT input for directory uploads
- Not really safe, is it?
    - make uploads and deletion/creation directories safe
- Screenshots
    
###Uses
- Bootstrap
- PHP
