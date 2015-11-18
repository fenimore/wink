Galleries are indexed in reverse alphabetical order, so if album title is the date, the most recent will be on top.

PHP glob only reads file extensions in lower case, included is a bash script which automatically changes file extension.

```bash
for file in *.JPG; do
    mv "$file" "`basename $file .JPG`.jpg"
done
```

###TODO
- Errors
- Genre/Subfolders
- select for directory uploads
- Not really safe, is it?
    - make uploads and deletion/creation directories safe
