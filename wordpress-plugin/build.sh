#!/usr/bin/env bash
# Membuat pemadam-hutan.zip yang siap diunggah lewat Plugins > Tambah Baru > Unggah Plugin.
# Game diambil dari ../pemadam-hutan.html agar hanya ada satu sumber.
set -euo pipefail
cd "$(dirname "$0")"
mkdir -p pemadam-hutan/game
cp ../pemadam-hutan.html pemadam-hutan/game/index.html
rm -f pemadam-hutan.zip
zip -qr pemadam-hutan.zip pemadam-hutan -x '*.DS_Store'
echo "Selesai: $(pwd)/pemadam-hutan.zip"
