Galleries are indexed in reverse alphabetical order, so if album title is the date, the most recent will be on top.

PHP glob only reads file extensions in lower case, included is a bash script which automatically changes file extension.

```bash
for file in *.JPG; do
    mv "$file" "`basename $file .JPG`.jpg"
done
```
Uploading through php can be a bit slow (this can be changed by configuring the server php init file). Using a FTP client might be much faster.


###TODO
- Errors
- add pgn/gif support
- Genre/Subfolders
- select input for directory uploads
- Not really safe, is it?
    - make uploads and deletion/creation directories safe
