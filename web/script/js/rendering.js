var table = null;

function createTableArtistes(artistes) {
    $(CONTENT).empty();
    table = document.createElement("table");
    $(CONTENT).append(table);
    $(table).append(getHeaderLineForTableArtistes());
    generateContentForTableArtistes(artistes);
    $(table).addClass("col-xs-10 col-xs-offset-1 books");

}