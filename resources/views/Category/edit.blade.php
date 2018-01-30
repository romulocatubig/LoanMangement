
       <form class="form-horizontal" method="post" action="{{url('/Category/Edit/')}}">
          {{csrf_field()}}
          <h3>Edit Categoty</h3>
          @foreach($list_category as $categoryloans)
          <input class="" type="hidden" name="id" value="{{$categoryloans->id}}" placeholder="id">
          <input class="" type="text" name="loantype" value="{{$categoryloans->loantype}}">
          <input class="" type="text" name="interest" value="{{$categoryloans->interest}}" >
          <input class="" type="text" name="min" value="{{$categoryloans->minimum_loan}}" >
          <input class="" type="text" name="max" value="{{$categoryloans->maximum_loan}}" >
          <input type="submit" name="btnsubmit" value="Save">
          <a href="{{url('/Category')}}">Cancel</a>
          @endforeach
       </form>
