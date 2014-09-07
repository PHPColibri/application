
/**
 * @namespace
 */
app = {};


app.init = function()
{
	/*$('<div id="xt-message-modal"></div>')
		.hide()
		.appendTo('body')
	;
	
	$('#xt-message-modal').dialog({
		modal: true,
		autoOpen: false,
		close: function(event,ui) {
			$(this).html('');
		}
	});*/
}
/**
 * @function
 * @param {string} message         текст или html сообщения
 * @param {string} [title ='']     текст заголовока
 * @param {bool}   [append=false]  добавлять ли сообщение к уже имеющимуся содержимому
 */
/*app.msg = function(message, title, append)
{
	title  = title  || '';
	append = append || false;
	
	$('#xt-message-modal')
		.html(append ? $('#xt-message-modal').html()+message : message )
		.dialog('option', {title: title})
		.dialog('option', {buttons: {Ok: function() {
			$(this).dialog('close');
		}}})
		.dialog('open')
	;
}*/
/**
 * @function
 * @param {string}   message                  текст или html вопроса
 * @param {string}   title                    текст заголовка
 * @param {callback} onConfirm                функция выполняющаяся при подтверждении
 * @param {string}   [okBtnText='Ok']         текст подтверждающей кнопки
 * @param {string}   [cancelBtnText='Отмена'] текст отклоняющей кнопки
 */
/*app.confirm = function(message,title,onConfirm,okBtnText,cancelBtnText)
{
	title = title || '';
	okBtnText = okBtnText || 'Ok';
	cancelBtnText = cancelBtnText || 'Отмена';
	
	$('#xt-message-modal')
		.html(message)
		.dialog('option', {title: title})
		.dialog('option', {buttons: [{
			text: okBtnText, click: function() {
				$(this).dialog('close');
				onConfirm();
			}},{
			text: cancelBtnText, click: function() {
				$(this).dialog('close');
			}
		}]})
		.dialog('open')
	;
}*/