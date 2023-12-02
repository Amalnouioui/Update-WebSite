var _____WB$wombat$assign$function_____ = function(name) {return (self._wb_wombat && self._wb_wombat.local_init && self._wb_wombat.local_init(name)) || self[name]; };
if (!self.__WB_pmw) { self.__WB_pmw = function(obj) { this.__WB_source = obj; return this; } }
{
  let window = _____WB$wombat$assign$function_____("window");
  let self = _____WB$wombat$assign$function_____("self");
  let document = _____WB$wombat$assign$function_____("document");
  let location = _____WB$wombat$assign$function_____("location");
  let top = _____WB$wombat$assign$function_____("top");
  let parent = _____WB$wombat$assign$function_____("parent");
  let frames = _____WB$wombat$assign$function_____("frames");
  let opener = _____WB$wombat$assign$function_____("opener");

////
//
//    Développer par Walid SEKRI
//    Mobile: 21 198 535
//    E-mail: walidsekri@gmail.com
//    Copyright © 2016
//                                                                             
////

function windowScroll()
{	
	//	
}
function head_max()
{
	$('header').animate({ 'height':'100px', backgroundColor:'rgba(0,0,0,0.05)' }, 1000, 'easeOutExpo');
	$('nav').animate({ 'top':'30px' }, 1000, 'easeOutExpo');
	$('#logo_header').animate({ height:'70px', top:'15px' }, 1000, 'easeOutExpo');	
}
function head_min()
{
	$('header').animate({ 'height':'54px', backgroundColor:'rgba(0,0,0,0.10)' }, 1000, 'easeOutExpo');
	$('nav').animate({ 'top':'5px' }, 1000, 'easeOutExpo');
	$('#logo_header').animate({ height:'40px', top:'8px' }, 1000, 'easeOutExpo');
}

//
//
//   La page est chargée
//
//
function page_charge()
{
	page = 'bxslider';
	//$('html, body').animate({ scrollTop:'0px' }, 100, 'easeOutExpo', function(){ $('.bxslider').css({ 'height':$('#bxslider').height()+'px' }); document.getElementById('chargement').style.visibility = 'hidden'; });
	document.getElementById('chargement').style.visibility = 'hidden';
}

//
//
//   Navigation
//
//
function clickPage (thisPage, thisBout, mouse)
{
	if ( page != thisPage )
	{
		if (mouse == 'over')
		{		
			$( thisBout ).stop().animate({ color:'#000', backgroundColor:'#fff' }, 400, 'easeOutExpo');
		}
		else if (mouse == 'out')
		{		
			$( thisBout ).stop().animate({ color:'#fff', backgroundColor:'transparent' }, 400, 'easeOutExpo');
		}
		else
		{
			$('nav ul li').css({ color:'#fff', backgroundColor:'transparent' });
			$(thisBout).css({ color:'#000', backgroundColor:'#fff' });
			
			$('html, body').animate({ scrollTop:$('#'+thisPage).offset().top }, 1000, 'easeOutExpo');
			page = thisPage;
			
			if (page != 'bxslider') { head_min(); }
			else { head_max(); }
			
			if (page == 'activities')
			{
				actv = '';
				clickActiv('eng','#b_eng','click');
			}
		}
	}
}

function clickPageMob (thisPage)
{
	$('html, body').animate({ scrollTop:$('#'+thisPage).offset().top }, 1000, 'easeOutExpo');
}

function clickActiv (thisActv, thisBout, mouse)
{
	if (actv != thisActv)
	{
		if (mouse == 'over')
		{		
			$('point', thisBout).stop().animate({ 'background-color':'rgba(250,190,20,1.00)' }, 800, 'easeOutExpo');
			$(thisBout).stop().animate({ 'opacity':'1.0' }, 800, 'easeOutExpo');
		}
		else if (mouse == 'out')
		{
			$('point', thisBout).stop().animate({ 'background-color':'transparent' }, 800, 'easeOutExpo');	
			$(thisBout).stop().animate({ 'opacity':'0.8' }, 800, 'easeOutExpo');
		}
		else
		{
			$('point', '#activities titres h4').stop().animate({ 'background-color':'transparent' }, 800, 'easeOutExpo');
			$('#activities titres h4').stop().animate({ 'opacity':'0.8' }, 800, 'easeOutExpo');
			
			$('point', thisBout).stop().animate({ 'background-color':'rgba(250,190,20,1.00)' }, 800, 'easeOutExpo');
			$(thisBout).stop().animate({ 'opacity':'1.0' }, 800, 'easeOutExpo');
			
			$('#activities article').css({ 'display':'none' });
			$('#activities article').css({ 'opacity':'0.5' });
			//			
			$('#'+thisActv).slideToggle(200, 'easeOutExpo');
			$('#'+thisActv).animate({ 'opacity':'1.0' }, 100);
			$('#'+thisActv).css({ 'display':'flex' });
			
			actv = thisActv;
		}
	}
}

function clickRef (thisRef, thisBout, mouse)
{
	if (ref != thisRef)
	{		
		if (mouse == 'over')
		{		
			$(thisBout).stop().animate({ 'width':'380px', 'background-color':'rgba(250,190,20,1.00)' }, 300, 'easeOutExpo');
		}
		else if (mouse == 'out')
		{
			$(thisBout).stop().animate({ 'width':'150px', 'background-color':'rgba(250,190,20,0.80)' }, 300, 'easeOutExpo');
		}
		else
		{
			$('#references article h2').stop().animate({ 'width':'150px', 'background-color':'rgba(250,190,20,0.80)' }, 300, 'easeOutExpo');
			$(thisBout).stop().animate({ 'width':'280px', 'background-color':'rgba(250,190,20,1.00)' }, 300, 'easeOutExpo');
			
			$('#references article bloc_ref').slideUp(100);
			//$('#references article bloc_ref').css({ 'display':'none' });
			$('#'+thisRef).slideDown(400, '', function(){ $('#'+thisRef).css({ 'display':'flex' }); });			
			
			ref = thisRef;
		}
	}
}

//
//  Envoi Mail
//
function envoiMail (_form)
{
	if (_form.nom.value != '' && _form.mail.value != '' &&  _form.obj.value != '' && _form.msg.value != '')
	{
		_form.btEnvoi.value = 'Sending... Please wait...';
		_form.btEnvoi.disabled = true;
		_form.nom.readOnly = _form.comp.readOnly = _form.posi.readOnly = _form.mail.readOnly = _form.tel.readOnly = _form.obj.readOnly = _form.msg.readOnly = true;
			
		$.ajax({
			type:'POST', url:'php/ajax.php?_func=envoi_mail', data:$(_form).serialize(), dataType:'html',
			success: function (_data, _statut)
			{
				_data = _data.trim(); //alert(_data);
				if (_data === 'yes')
				{
					_form.btEnvoi.value = 'Email sent.';
				}
				else
				{
					alert ('Failed to send, try again later!');
					_form.btEnvoi.readOnly = _form.nom.readOnly = _form.comp.readOnly = _form.posi.readOnly = _form.mail.readOnly = _form.tel.readOnly = _form.obj.readOnly = _form.msg.readOnly = false;
					_form.btEnvoi.value = 'SEND';
					_form.btEnvoi.disabled = false;
				}
			},
			error: function (_resultat, _statut, _erreur)
			{
				alert ('Failed to send, try again later!');
				_form.btEnvoi.readOnly = _form.nom.readOnly = _form.comp.readOnly = _form.posi.readOnly = _form.mail.readOnly = _form.tel.readOnly = _form.obj.readOnly = _form.msg.readOnly = false;
				_form.btEnvoi.value = 'SEND';
				_form.btEnvoi.disabled = false;
			}
		});
	}
	else alert ('Failed to send, please complete all required fields!');
}
}