<div class="modal fade" id="modal-add">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<form autocomplete="off" action="" data-url="{{ route('details-discount.store')}}" id="form-add" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				
				<div class="modal-header">
					<h4 class="modal-title">Thêm mã giảm giá cho khách hàng</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body" style="display:flex;">
					<div class="form-group" style="width:100%" >
					
                        <div style="margin-top: 10px;">
							<p style="margin-right: 45px;">Chọn tin tức:</p>
							<select name ="discountselect" id="selectsize" class="form-select" aria-label="Default select example">																
							</select>
						</div>
						<div>
				</div>
                    <table class='table table-striped' id="table1">
                        <thead style="text-align">
                            <tr>
                                <th style="text-align:center;">STT</th>
                                <th style="text-align:center;"> Tên khách hàng</th>
                                <th style="text-align:center;">Tên tài khoản</th>
                                <th></th>  
                            </tr>
                        </thead>
                        <tbody id="grdiscount">                                  
                    
                        </tbody>
                    </table>	
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
					<button type="submit" class="btn btn-primary">Thêm</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#selectsize').on('change', function() {
		var iddiscount = $(this).val();

		$.ajax({
                type: 'get',
                url: "{{ route('load-customer.loadCustomer')}}",
				data: { iddiscount: iddiscount,  _token: '{{csrf_token()}}' },
                success: function(response) {
                    $('#grdiscount').empty();
                    var i;
                    $.each(response.customer, function (k, v) {  
                       i= 1;
                        $.each(response.lisdiscount, function (k, s) { 
                        
                            if (s.CustomerID != v.CustomerID && i == 1 ){  
                                let tr = '<tr>'
                                    tr += '<td style="text-align:center">1</td>';
                                    tr += '<td style="text-align:center">' + v.CustomerName + '</td>';
                                    tr += '<td style="text-align:center">' + v.UserName + '</td>';
                                    tr += '<td style="text-align:center"><input type="checkbox" value="'+v.CustomerID+'" name="checkdiscount[]" ></td>'; 
                                $('#grdiscount').append(tr);
                                i++;
                            }else {
                                return false;
                            }                    
                        }); 
                    });
                    console.log(response.lisdiscount);
                    console.log(response.customer);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("Loi");
                }
            })
	})
</script>