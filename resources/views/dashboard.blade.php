@extends('layouts.admin')

@section('pagename')
Library
@endsection

@section('content')

<style>

.swal2-container.swal2-center {
    align-items: flex-start !important;
}
.swal2-modal{
           margin:0px !important;
           margin-top:100px !important;
           width:60em;
}
.swal2-content {
    font-size:18px;
}
.swal2-header .swal2-title {
    font-size:40px;
}
.swal2-confirm .swal2-styled{
    padding 10px 40px;
}
.lia {

    list-style-type: none;
    /* display: flex; */
    margin-right: 20px;
    margin-bottom: 15px;
    background-color: #fff;
    padding: 10px 39px;
    min-height: 130px;
    display: flex;
    align-items: center;
    justify-content: center ;
    position:relative;

    -webkit-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
-moz-box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
box-shadow: 0px 0px 18px -5px rgba(189,189,189,1);
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance:textfield;
}

</style>
    <div class="row-fluid">
    	<div class="span12">
      		<div class="widget-box">



	    		<p id="percentage-msg" class="text-danger text-left" style="margin-top: -30px;"></p>

	    		<div class="widget-content nopadding">
	    		    <div class="container-fluid">

	    		    </div>
	    		</div>

    	</div>

   	</div>


	<!-- Modal Code Start Vouchers -->

<div class="modal fade" id="transferHistory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Transfer History</h4>
      </div>
      <div class="modal-body">
          <div class="container-fluid">
              <div class="row" style="margin-bottom:25px;">
                  <p style="display:inline;font-size:x-large;">Total Balance</p>
                  <p style="display:inline; float:right;font-size:xx-large;color:darkgray;" id="totalAmount"></p>

              </div>
          </div>
          <table class="table table-responsive">
              <thead>
                  <tr>
                  <th>Bank Name</th>
                  <th>Amount Transferred</th>
                  <th>Date Of Transfer</th>
                  </tr>
              </thead>
              <tbody id="wallet-history">

              </tbody>
          </table>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>

  </div>
</div>


	<!-- Modal Code start COnfirm Message -->
@endsection

@section('scripts')
<script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
function viewWallet(id){

    {{--$.ajax({--}}
    {{--    url:"{{route('get-transaction-history')}}",--}}
    {{--    type: 'get',--}}
    {{--    data:{--}}
    {{--        'id':id,--}}
    {{--        'flag':0,--}}
    {{--    },--}}
    {{--    success: function (data){--}}
    {{--        console.log(data);--}}
    {{--        $('#totalAmount').text(data['value']+'$');--}}
    {{--       var html='';--}}
    {{--        $.each(data['data'] ,function(i,v){--}}
    {{--        html+="<tr><td>"+v['bank_name']+"</td><td>"+v['amount']+"</td><td>"+v['date']+"</td></tr>";--}}
    {{--        });--}}

    {{--        $('#wallet-history').empty();--}}
    {{--        $('#wallet-history').append(html);--}}
    {{--        $('#transferHistory').modal('show');--}}
    {{--    }--}}

    {{--});--}}
}
</script>

@endsection
