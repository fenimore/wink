Galleries are indexed in reverse alphabetical order, so if album title is the date, the most recent will be on top.

PHP glob only reads file extensions in lower case, included is a bash script which automatically changes file extension.

```bash
for file in *.html; do
    mv "$file" "`basename $file .html`.txt"
done
```
