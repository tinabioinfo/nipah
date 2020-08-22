#!/bin/bash
input="./list"
while read -r line
do
	#echo "$line"
	prefix=${line%.*}
	#echo "$prefix";
	obabel ../Structures_Marvin_conversion/$line -O ./$prefix.svg -xb -xC -xe
done < "$input"
