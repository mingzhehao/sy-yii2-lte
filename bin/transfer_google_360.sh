#!/bin/sh
sed -i "s/https:\/\/fonts.googleapis.com/http:\/\/fonts.useso.com/g" `find ./vendor -type f -name "*.css"`
sed -i "s/https:\/\/fonts.googleapis.com/http:\/\/fonts.useso.com/g" `find ./vendor -type f -name "*.less"`
