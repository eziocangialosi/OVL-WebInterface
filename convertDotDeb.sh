#! /bin/bash
ar x ovl-website.deb
zstd -d < control.tar.zst | xz > control.tar.xz
zstd -d < data.tar.zst | xz > data.tar.xz
ar -m -c -a sdsd /tmp/ovl-website-deb11.deb debian-binary control.tar.xz data.tar.xz
rm debian-binary control.tar.xz data.tar.xz control.tar.zst data.tar.zst
cp /tmp/ovl-website-deb11.deb ./
echo "Done"
