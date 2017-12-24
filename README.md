# Wink

A simple flat file photo gallery.

Just stick your photos inside the `media` directory, and you've got a fully functioning photo gallery!

The styles and layouts are intentionally minimalist, not just cause I like it that way, but to allow for better extensibility!

## Set Up

- Easy setup! Upload this repository onto a server running PHP.
- To change the password to admin, simply go into `auth/` and change the md5 hash to your desired password (e.g. "hello" is `907e131eb3bf6f21292fa1ed16e8b60c` MD5).
- Inside the `media` directory, place **category** directories, and inside those, place the **albums**.
- The **thumbnails** can be automatically generated in the `admin` page. and **Zip** files will be added once someone downloads an album.

Here's what the file structure of `media` might look like:

```
...
    ├── media
    │   ├── 2014_Travels.zip
    │   └── Film Category
    │       ├── 2014_Travels
    │       │   ├── image1.jpg
    │       │   ├── image2.jpg
    │       │   ├── image3.jpg
    │       │   ├── image4.jpg
    │       │   └── thumbnails
    │       │       ├── thmb-image1.jpg
    │       │       ├── thmb-image2.jpg
    │       │       ├── thmb-image3.jpg
    │       │       └── thmb-image4.jpg
    │       ├── 2015_Travels
    │       │   ├── 76140002.jpg
    │       │   ├── 76140003.jpg
    │       │   └── thumbnails
    │       │       ├── thmb-76140002.jpg
    │       │       └── thmb-76140003.jpg
```

### Titles and Sorting

The categories and galleries are directories, with _ and - replaced by spaces. The image titles are the filenames likewise stripped of _ and -. Galleries are indexed in **reverse alphabetical/numerical order**, so if album title is the date, the most recent will be on top.

### Uploads

Uploading through php can be a bit slow (this can be changed by configuring the server php init file). Using a FTP client might be much faster.

I recommend [bimp](http://www.alessandrofrancesconi.it/projects/bimp/) for using gimp to **compress images in batches**. Upload a directory of photographs into the media folder, and it will appear on the index of galleries.

### Supported Extensions
This PHP glob only reads file extensions in lower case, included is a bash script which automatically changes file extensions to lower case. `cd` into the directory with such extensions, and run, `sh lower_case.sh`:

```bash
for file in *.JPG; do
    mv "$file" "`basename $file .JPG`.jpg"
done
```

## Roadmap

- [ ] Better Errors reports
    - login/password
    - uploads
        - size
        - ext
    - delete & create
- [ ]  htaccess

## Dependencies
- PHP (I use 7, but whatever should work)
- PHP gd and zip modules
- Bootstrap (CDN)

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
    along with this program.  If not, see https://www.gnu.org/licenses.
