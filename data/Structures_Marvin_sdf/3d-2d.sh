#!/bin/bash
for f in *.sdf; do
    #mv -- "$f" "$(basename -- "$f" .svg).sdf"
	echo $f
	obabel $f -osdf -O ../structures_2d/$f --gen2d
done

