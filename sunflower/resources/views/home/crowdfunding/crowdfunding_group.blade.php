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
 <form  action="{{ URL::route('crowdfunding/docfgroup') }}" method="post"  id="myform" enctype="multipart/form-data">

	<div class="tdbModule identityInfo">
		<div class="registerTitle">身份信息</div>
			<div class="registerCont">
				<div class="col-sm-12 col-sm-offset-3">
					<div class="col-md-12">
						<!-- 机构名称 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9">
					            <input name="cf_gname" id="gname" class="form-control" style="width:800px;" placeholder="请输入名称" type="text"><span id="panme_error"></span> <span class="help-block m-b-none"><span style="color:red;">*</span>输入企业/机构名称(需与结算时银行卡开户名字一致）</span>
					        </div>
					    </div>
					    <!-- 机构营业执照号 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_license_number" id="license_number" class="form-control" style="width:800px;" placeholder="请填写营业执照号或组织机构代码" type="text"> <span class="help-block m-b-none"><span style="color:red;">*</span>请填写营业执照号或组织机构代码,15个字符</span>
					        </div>
					    </div>
					    <!-- 法人代表姓名 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_legalname" id="legalname" class="form-control" style="width:800px;" placeholder="请输入法定代表人姓名" type="text"> 
					        </div>
					    </div>
						<!-- 企业机构注册地址 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_reg_address" id="reg_address" class="form-control" style="width:800px;" placeholder="请输入企业/机构注册地址" type="text"> 
					        </div>
					    </div>
						<!-- 联系人 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_contact_name" id="contact_name" class="form-control" style="width:800px;" placeholder="请输入联系人姓名" type="text"> 
					        </div>
					    </div>
 						<!-- 联系人电话 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_contact_tel" id="contact_tel" class="form-control" style="width:800px;" placeholder="请输入联系人手机号" type="text"> <span class="help-block m-b-none"><span style="color:red;">*</span>手机号，输入纯数字，11位数字</span>
					        </div>
					    </div>
 						<!-- 企业机构经营地址 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_business_address" id="business_address" class="form-control" style="width:800px;" placeholder="请输入企业/机构经营地址" type="text"> <span></span>
					        </div>
					    </div>
					    <!-- 客服联系人电话 -->
					    <div class="form-group" style="margin-left:-745px;">
					        <label class="col-sm-3 control-label"></label>
					        <div class="col-sm-9" style="margin-top:20px;">
					            <input name="cf_service_tel" id="service_tel" class="form-control" style="width:800px;" placeholder="请输入移动手机号或固定电话,固定电话需带区号,如：010-12345678" type="text"> <span class="help-block m-b-none" style="margin-bottom:50px;" >
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
						 <!-- 上传相关资料 -->
						<div class="idcardTitle" style="margin-bottom:20px;" >上传相关资料</div>
					    <div class="form-group" style="margin-left:-245px;">
					        <label class="col-sm-3 control-label" style="color:#444444;"><span style="color:red">*</span>营业执照</label>
					        <div class="col-sm-9" style="margin-bottom:50px;">
					            <input name="cf_business_license" id="cf_business_license" type="file" >
					        </div>
					    </div><br/>
					    <div class="form-group" style="margin-left:-245px;">
				            <label class="col-sm-3 control-label" style="color:#444444;"><span style="color:red">*</span>其他资料1</label>
					        <div class="col-sm-9"style="margin-bottom:50px;" >
					            <input name="cf_other1" id="cf_other1" type="file">
					        </div>
					    </div>
					     <div class="form-group" style="margin-left:-245px;">
				            <label class="col-sm-3 control-label" style="color:#444444;"><span style="color:red">*</span>其他资料2</label>
					        <div class="col-sm-9"style="margin-bottom:50px;" >
					            <input name="cf_other2" id="cf_other1" type="file">
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

	$("#license_number").blur(function()
	{
		$("#license_number_error").remove();
		
		//接值
		var license_number=$(this).val();
		var license_number_ver=/^[0-9]{15}$/;
		// alert(pname);	
			
			if(license_number=="")
	        {
	            $(this).parent().append("<span id='license_number_error' style='color:red;font-weight:blod;'>营业执照号不能为空</span>");
	            // $("#pname").focus();  
            	$("#myform").submit(function()
            	{
            		alert("请检查您输入的信息是否为空或格式是否正确");
            		return false;
            	});
            	
            		
	        }
	        else if(!license_number_ver.test(license_number))
	        {
	        	$(this).parent().append("<span id='license_number_error' style='color: red;font-weight:blod;'>请检查输入的长度是否正确</span>");	   
	            // $("#pname").focus();  
            	 $("#myform").submit(function()
            	{
            		alert("请检查您输入的信息是否为空或格式是否正确");
            		return false;
            	});
	           
	        }
	        else
	        {
	            $(this).parent().append("<span id='license_number_error' style='color:green;font-size:20px;'>√</span>");
	          	$("#myform").unbind('submit'); 
	            $("#myform").submit(function()
            	{
            		return true;
            	});	            
         	    
	        }
       
	});
	$("#contact_tel").blur(function()
	{
		$("#contact_tel_error").remove();
		
		//接值
		var contact_tel=$(this).val();
		var contact_tel_ver=/^((13[0-9])|(17[8|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/;
		// alert(number);		
		if(contact_tel=="")
        {
            $(this).parent().append("<span id='contact_tel_error' style='color: red;font-weight:blod;'>联系人号码不能为空</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        }
        if(!contact_tel_ver.test(contact_tel))
        {
        	$(this).parent().append("<span id='contact_tel_error' style='color: red;font-weight:blod;'>请检查输入的联系人号码格式是否正确</span>");
           
            $("#myform").submit(function()
        	{
        		alert("请检查您输入的信息是否为空或格式是否正确");
        		return false;
        	});
        }
        else
        {
            $(this).parent().append("<span id='contact_tel_error' style='color:green;font-size:20px;'>√</span>");
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
            $(this).next().append("<span id='service_tel_error' style='color:red;font-weight:blod;'>客服联系人电话不能为空</span>");
           
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
		var gname=$("#gname").val();
		var license_number=$("#license_number").val();
		var legalname=$("#legalname").val();
		var reg_address=$("#reg_address").val();
		var contact_name=$("#contact_name").val();
		var contact_tel=$("#contact_tel").val();		
		var business_address=$("#business_address").val();
		var service_tel=$("#service_tel").val();
		if(gname=="" && license_number=="" && legalname=="" && reg_address=="" && contact_name=="" && contact_tel=="" && business_address=="" && service_tel=="")
		{
			alert("请填写身份信息再进行下一步");
			return false;
		}

	});
	

</script>
@endsection
