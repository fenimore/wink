# Wink

A simple flat file photo gallery.

## Set Up

Easy setup! Simply go into `auth/` and change the md5 hash to your desired password (the default is "hello", or `907e131eb3bf6f21292fa1ed16e8b60c` MD5), and then upload the site files onto a server running PHP.

## Thumbnails?

the production of thumbnails from uploads is not yet implemented, see the thumbnails branch.

### Titles and Sorting

The categories and galleries are directories, with _ and - replaced by spaces. The image titles are the filenames likewise stripped of _ and -. Galleries are indexed in reverse alphabetical order, so if album title is the date, the most recent will be on top.

### Uploads
Uploading through php can be a bit slow (this can be changed by configuring the server php init file). Using a FTP client might be much faster. I recommend [bimp](http://www.alessandrofrancesconi.it/projects/bimp/) for using gimp to **compress images in batches**. Upload a directory of photographs into the media folder, and it will appear on the index of galleries.

### Supported Extensions
This PHP glob only reads file extensions in lower case, included is a bash script which automatically changes file extensions to lower case.

```bash
for file in *.JPG; do
    mv "$file" "`basename $file .JPG`.jpg"
done
```

## TODO
- Favicon
- Errors reports
    - login/password
    - uploads
        - size
        - ext
    - delete & create
- htaccess
- Prev and Next should be larger buttons
- Contact/About Page
- Improve Admin dashboard
- Download/Upload Zip file
- Add thumbnail creation to ease up load times with large images
  - See: [stackoverflow](http://stackoverflow.com/questions/11376315/creating-a-thumbnail-from-an-uploaded-image)

## Dependencies
- Bootstrap (CDN)
- PHP (5.4/5.2? I'm not sure)

## License

Fenimore Love 2015 - 2016

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see http://www.gnu.org/licenses.
