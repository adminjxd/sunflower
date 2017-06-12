<!--layouts 引入头部底部-->
@extends('home.layouts.layout')
@section('content')
<link rel="shortcut icon" href="favicon.ico"> <link href="{{ URL::asset('/css/bootstrap.min.css?v=3.3.6') }}css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="{{ URL::asset('/css/font-awesome.css?v=4.4.0') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/animate.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/summernote.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/summernote-bs3.css') }}" rel="stylesheet">
<link href="{{ URL::asset('/css/style.css?v=4.1.0') }}" rel="stylesheet">
 <!-- 全局js -->
<script src="{{ URL::asset('/js/jquery.min.js?v=2.1.4') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.min.js?v=3.3.6') }}"></script>
<script src="{{ URL::asset('/js/jquery-2.1.1.min.js') }}" type="text/javascript"></script>
<!-- 自定义js -->
<script src="{{ URL::asset('/js/content.js?v=1.0.0') }}"></script>

<!-- jQuery UI -->
<script src="{{ URL::asset('/js/jquery-ui-1.10.4.min.js') }}"></script>

<!-- From Builder -->
<script src="{{ URL::asset('/js/beautifyhtml.js') }}"></script>
<!--登录-->
<div class="wrap">
 <form  action="{{ URL::route('crowdfunding/docfperson') }}" method="post"  id="myform" enctype="multipart/form-data">

	<div class="tdbModule identityInfo">
		<div class="registerTitle">身份信息</div>
			<div class="registerCont">
				<div class="col-sm-12 col-sm-offset-3">
					<div class="col-md-12">
						<!-- 个人姓名 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9">
					            <input name="cf_pname" id="pname" class="form-control" style="width:800px;" placeholder="请输入姓名" type="text"><span id="panme_error"></span> <span class="help-block m-b-none"><span style="color:red;">*</span>输入中文名字，2-20个字符（需与结算时银行卡开户名字一致）</span>
					        </div>
					    </div>
					    <!-- 身份证号码 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_idcard" id="idcard_number" class="form-control" style="width:800px;" placeholder="请输入身份证号" type="text"> <span class="help-block m-b-none"><span style="color:red;">*</span>二代身份证，请输入数字或字母</span>
					        </div>
					    </div>
					    <!-- 手机号码 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_tel" id="tel" class="form-control" style="width:800px;" placeholder="请输入手机号" type="text"> <span class="help-block m-b-none"><span style="color:red;">*</span>手机号，输入纯数字，11位数字</span>
					        </div>
					    </div>
					    <!-- 所在区域 -->
						<script type="text/javascript" src="{{ URL::asset('/js/jsAddress.js') }}"></script>
						    <div class="form-group" style="margin-left:-745px;">
						        <label class="col-sm-3 control-label"></label>
						        <div class="col-sm-9" style="margin-top:20px;">
							        省：<select id="cmbProvince" name="cmbProvince" style="width:120px;height:35px;"  class="inline form-control"></select>
									市：<select id="cmbCity" name="cmbCity" style="width:120px;height:35px;"  class="center-block inline form-control"></select>
									区：<select id="cmbArea" name="cmbArea" style="width:120px;height:35px;" class="center-block inline form-control"></select>
        						</div>
    						</div>
						<script type="text/javascript">
						addressInit('cmbProvince', 'cmbCity', 'cmbArea');
						</script>
						<!-- 客服联系人 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_service" id="service" class="form-control" style="width:800px;" placeholder="请输入客服联系人" type="text"> <span class="help-block m-b-none">
					        </div>
					    </div>
					    <!-- 客服联系人电话 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_service_tel" id="service_tel" class="form-control" style="width:800px;" placeholder="请输入移动手机号或座机号" type="text"> <span class="help-block m-b-none" style="margin-bottom:50px;"><span style="color:red;">*</span>请输入移动手机号或固定电话,固定电话需带区号,如：010-12345678</span>
					        </div>
					    </div>
					    <!-- 众筹项目类型 -->
						
					    <div class="typeTitle" style="margin-top:50px;">选择你要创建的项目类型</div>
						    <div class="form-group">

						        <label class="col-sm-3 control-label"></label>
						        <div class="col-sm-9">
						            <select class="form-control"  name="cf_protype" id="cf_protype" style="width:120px;height:35px;margin-left:-555px;margin-top:20px;margin-bottom:50px;">
						                @foreach ($data as $val)
						                <option>{{ $val->cf_cname }}</option>
						                @endforeach
						            </select>
						        </div>
						    </div>
						</div>
						<!-- 证件照 -->
						<div class="idcardTitle" style="margin-bottom:20px;" >上传相关证件照</div>
					    <div class="form-group" style="margin-left:-245px;">
					        <label class="col-sm-3 control-label" style="color:#444444;"><span style="color:red">*</span>身份证正面照</label>
					        <div class="col-sm-9" style="margin-bottom:50px;">
					            <input name="cf_cardup" id="cf_cardup" type="file" >
					        </div>
					    </div><br/>
					    <div class="form-group" style="margin-left:-245px;">
				            <label class="col-sm-3 control-label" style="color:#444444;"><span style="color:red">*</span>身份证背面照</label>
					        <div class="col-sm-9"style="margin-bottom:50px;" >
					            <input name="cf_carddown" id="cf_carddown" type="file">
					        </div>
					    </div>
					    <!-- 平台费用 -->
					    <div class="terraceTitle" style="margin-bottom:20px;" >选择平台渠道费</div>
					    <label class="col-sm-3 control-label"></label>
						<div class="col-sm-9">
						  <input checked="" value="1" id="cf_consume_status" name="cf_consume_status" type="radio" style="margin-left:-535px;margin-bottom:20px;">&nbsp;&nbsp;&nbsp;渠道费 2% (用于支付给第三方支付机构，如众筹项目不成功，则不收取该笔费用。)
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<input type="submit" class="btn btn-primary" style="margin-left:200px;width:50px;" id="next" value="下一步">
 </form>
</div>
<script type="text/javascript"> 

	$("#pname").blur(function()
	{
		$("#panme_error").remove();
		
		//接值
		var pname=$(this).val();
		var pname_ver=/^[\u4e00-\u9fa5]{2,20}$/;
		// alert(pname);	
			
			if(pname=="")
	        {
	            $(this).parent().append("<span id='panme_error' style='color:red;font-weight:blod;'>姓名不能为空</span>");
	            // $("#pname").focus();  
            	$("#myform").submit(function()
            	{
            		alert("请检查您输入的信息是否为空或格式是否正确");
            		return false;
            	});
            	
            		
	        }
	        else if(!pname_ver.test(pname))
	        {
	        	$(this).parent().append("<span id='panme_error' style='color: red;font-weight:blod;'>请检查输入的是否为中文姓名或姓名长度是否正确</span>");	   
	            // $("#pname").focus();  
            	 $("#myform").submit(function()
            	{
            		alert("请检查您输入的信息是否为空或格式是否正确");
            		return false;
            	});
	           
	        }
	        else
	        {
	            $(this).parent().append("<span id='panme_error' style='color:green;font-size:20px;'>√</span>");
	          	$("#myform").unbind('submit'); 
	            $("#myform").submit(function()
            	{
            		return true;
            	});	            
         	    
	        }
       
	});
	$("#idcard_number").blur(function()
	{
		$("#number_error").remove();
		
		//接值
		var number=$(this).val();
		var number_ver=/^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
		// alert(number);		
		if(number=="")
        {
            $(this).parent().append("<span id='number_error' style='color: red;font-weight:blod;'>身份证号不能为空</span>");
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        if(!number_ver.test(number))
        {
        	$(this).parent().append("<span id='number_error' style='color: red;font-weight:blod;'>请检查输入的身份证号码格式是否正确</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        else
        {
            $(this).parent().append("<span id='number_error' style='color:green;font-size:20px;'>√</span>");
          
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	      
        }
	});
	$("#tel").blur(function()
	{
		$("#tel_error").remove();
		
		//接值
		var tel=$(this).val();
		var tel_ver=/^((13[0-9])|(17[8|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/;
		// alert(number);		
		if(tel=="")
        {
            $(this).parent().append("<span id='tel_error' style='color: red;font-weight:blod;'>手机号不能为空</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        if(!tel_ver.test(tel))
        {
        	$(this).parent().append("<span id='tel_error' style='color: red;font-weight:blod;'>请检查输入的手机号码格式是否正确</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        else
        {
            $(this).parent().append("<span id='tel_error' style='color:green;font-size:20px;'>√</span>");
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	   
        }
	});
	$("#service").blur(function()
	{
		// alert($);
		$("#service_error").remove();
		
		//接值
		var service=$(this).val();
		var service_ver=/^[\u4e00-\u9fa5a-zA-Z]{2,20}$/;
		// alert(service);		
		if(service=="")
        {
            $(this).parent().append("<span id='service_error' style='color:red;font-weight:blod;'>客服联系人姓名不能为空</span>");
            
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        if(!service_ver.test(service))
        {
        	$(this).parent().append("<span id='service_error' style='color: red;font-weight:blod;'>请检查输入的姓名格式或姓名长度是否正确</span>");
            
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        else
        {
            $(this).parent().append("<span id='service_error' style='color:green;font-size:20px;'>√</span>");
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	
        }
	});
	$("#service_tel").blur(function()
	{
		// alert($);
		$("#service_tel_error").remove();
		
		//接值
		var service_tel=$(this).val();
		var service_tel_ver=/^(0\d{2,3}-\d{7,8}(-\d{3,5}){0,1})|((13[0-9])|(17[8|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/;
		// alert(service);		
		if(service_tel=="")
        {
            $(this).next().append("<br/><span id='service_tel_error' style='color:red;font-weight:blod;'>客服联系人电话不能为空</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        if(!service_tel_ver.test(service_tel))
        {
        	$(this).next().append("<span id='service_tel_error' style='color: red;font-weight:blod;'>请检查输入的客服联系人电话格式是否正确</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        	return false;
        }
        else
        {
            $(this).next().append("<span id='service_tel_error' style='color:green;font-size:20px;'>√</span>");
            $("#myform").unbind('submit'); 
            $("#myform").submit(function()
        	{
        		return true;
        	});	
        }
	});
	$("#myform").submit(function()
	{
		var pname=$("#pname").val();
		var idcard_number=$("#idcard_number").val();
		var tel=$("#tel").val();
		var service=$("#service").val();
		var service_tel=$("#service_tel").val();
		if(pname=="" && idcard_number=="" && tel=="" && service=="" && service_tel=="")
		{
			alert("请填写身份信息再进行下一步");
			return false;
		}

	});
	

</script>
@endsection
