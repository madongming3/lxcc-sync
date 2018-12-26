/* 表单验证 */
;(function($) {

	var message = {};
	message.success = function(msg) {
		var $card = $.icard({
			'class': 'i-message',
			'title': '',
			'content': msg,
			'width': 300
		}).show().align();
		setTimeout(function() {
			$card.fadeOut();
		}, 2000);
	}

	//检查input
	$('input[name="nrobot"]').inspect({
		'min': 1,
		'success': function() {
			var $wrap = this;
			//$wrap.next('.error').html('').addClass('text-success').removeClass('text-error').show();
			$wrap.next('.error').html('').addClass('corrects').removeClass('text-error').show();
		},
		'error': function() {
			var $wrap = this;
			$wrap.next('.error').html('robot描述不能为空！').addClass('text-error').removeClass('corrects').show();
		}
	});

	
	$('input[name="ip"]').inspect({
		'min': 1,
		'type':'url',
		'success': function() {
			var $wrap = this;
			$wrap.next('.error').html('').addClass('corrects').removeClass('text-error').show();
		},
		'error': function() {
			var $wrap = this;
			$wrap.next('.error').html('ip地址不合法！').addClass('text-error').removeClass('corrects').show();
		},
		'closest':'.info-list'
	});

	$('input[name="port"]').inspect({
		'min': 1,
        'type': 'number',
		'success': function() {
			var $wrap = this;
			$wrap.next('.error').html('').addClass('corrects').removeClass('text-error').show();
		},
		'error': function(e) {
			var $wrap = this;
			$wrap.next('.error').html(e).addClass('text-error').removeClass('corrects').show();
		},
		'closest':'.info-list'
	});
	
	$('input[name="wwwroot"]').inspect({
		'min': 1,
		'success': function() {
			var $wrap = this;
			$wrap.next('.error').html('').addClass('corrects').removeClass('text-error').show();
		},
		'error': function() {
			var $wrap = this;
			$wrap.next('.error').html('路径输入不合法！').addClass('text-error').removeClass('corrects').show();
		},
		'closest':'.info-list'
	});


	$('input[name="username"]').inspect({
		'min': 1,
		'success': function() {
			var $wrap = this;
			$wrap.next('.error').html('').addClass('corrects').removeClass('text-error').show();
		},
		'error': function() {
			var $wrap = this;
			$wrap.next('.error').html('用户名不能为空！').addClass('text-error').removeClass('corrects').show();
		}
	});

	$('input[name="password"]').inspect({
		'min': 1,
		'success': function() {
			var $wrap = this;
			$wrap.next('.error').html('').addClass('corrects').removeClass('text-error').show();
		},
		'error': function() {
			var $wrap = this;
			$wrap.next('.error').html('密码不能为空！').addClass('text-error').removeClass('corrects').show();
		}
	});

	//检查表单
	$('#robot_form').forminspect({
		'success' : function(){},
		'error':function(){
			//message.success('表单有选项不合法，请检查之后再提交');
		},
		'onsubmit':function(json){
			json = $.parseJSON(json);
			if(json.code == '0'){
				$.comfirm(json.message).onok(function(){
					window.location.href = json.data.href;	
				});
			}else{
				if(json.data){
					for(var key in json.data){
					  if(json.data[key]) $('[name="'+key+'"]').next('.error').addClass('text-error').removeClass('corrects').html(json.data[key]).show();
					}
				}
			}
			return false;
			
		}
	});

	/* 提示信息*/
	$('tr[action-type="act-server-infos"]').itips({
		'class':'i-team-tips filter-drop-shadow',
		'title':'服务器内容',
		'content':'<ul><li>服务器信息：php服务器</li><li>服务器信息：php服务器</li><li>服务器信息：php服务器</li></ul>',
		'width':400
	});

	/*  删除列表二次确认 */
	$('body').on('click','a[action-type="act-server-del"]',function(e) {
		e.preventDefault();

		var $this = $(this);
		var url = $(this).attr('href');

		var $card = $.comfirm('服务器删除后需要重新创建才能找回，确认删除吗?').onok(function(e) {
			$.getJSON(url, function(json) {
				if(json.code == 0){
					$this.closest('tr').remove();
					message.success(json.message);
				}else{
					message.success(json.message);
				}
			});
		});

		return false;
	});

}(jQuery));


