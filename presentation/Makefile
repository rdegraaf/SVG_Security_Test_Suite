DOC=presentation
FILES=$(DOC).tex 

pdf: $(FILES) clean
	lualatex -file-line-error -synctex=1 $(DOC).tex
	lualatex -file-line-error -synctex=1 $(DOC).tex

spell:
	for i in $(FILES); do aspell -c -t "$${i}"; done

check:
	lacheck $(DOC).tex
view:
	make clean && make && evince $(DOC).pdf 2>/dev/null&
	#make clean && make && xpdf -remote 127.0.0.1 $(DOC).pdf&

clean:
	-rm -f ${DOC}.pdf *.tmp *.out *.aux *.idx *.log *.ilg *.xref *.lg \
         *.toc *.ind *.4og *.4ct *.4tc *.idv *.lot *.lov *.lltr *.lstr \
         *.dvi *.odt *.rtf *.html *.snm *.nav *.vrb $(DOC).synctex.gz \
		 tex4ht.env > /dev/null 2>&1
