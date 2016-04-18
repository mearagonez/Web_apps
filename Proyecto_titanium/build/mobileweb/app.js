(function (e){
	
	win = Ti.UI.createWindow({
		backgroundColor: 'white'
	}),
	
	fileSystem = require('ui/fileSystem'),
	 buttonCreate = Ti.UI.createButton({
	 	
	 	title: 'crear',
	 	width: '20%',
	 	height: '10%',
	 	top: '0%',
	 	
	 	
	 }),
	 
	 buttonDelete = Ti.UI.createButton({
	 	
	 	title: 'eliminar',
	 	width: '20%',
	 	height: '10%',
	 	top: '10%',
	 	
	 	
	 }),
	 
	 buttonShow = Ti.UI.createButton({
	 title: 'mostrar',
	 	width: '20%',
	 	height: '10%',
	 	top: '20%'	,
	 	
	 }),
	 textField = Ti.UI.createTextField({
	 	borderStyle: Ti.UI.INPUT_BORDERSTYLE_ROUNDED,
	 	color: '#336699',
	 	top: '30%',
	 	width: '60%',
	 	height: '10%',
	 }),
	 buttonUpdate = Ti.UI.createButton({
	 	
	 	title: 'subr',
	 	width: '20%',
	 	height: '10%',
	 	top: '40%',
	 	
	 	
	 });
	 //agregar a pantalla
	 win.add(buttonCreate);
	 win.add(buttonDelete);
	 win.add(buttonShow);
	 win.add( textField );
	 win.add(buttonUpdate );
	
	//eventos
	
	buttonCreate.addEventListener('click',fileSystem.create);
	buttonDelete.addEventListener('click',fileSystem.deleting);
	buttonShow.addEventListener('click',fileSystem.show);
	buttonUpdate.addEventListener('click',function(e){
	fileSystem.update(textField.value);	
	textField.value = '';
	});
	win.open();
})();
