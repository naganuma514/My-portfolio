function allcheck( tf ) {
	var ElementsCount = document.mother.elements.length; // チェックボックスの数
	for( i=0 ; i<ElementsCount ; i++ ) {
	   document.mother.elements[i].checked = tf; // ON・OFFを切り替え
	}
 }