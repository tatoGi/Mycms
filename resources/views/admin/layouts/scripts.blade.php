

        <script src="{{asset('/admin/assets/plugins/global/plugins.bundle.js')}}"></script>
        <script src="{{asset('/admin/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
        <script src="{{asset('/admin/assets/js/scripts.bundle.js')}}"></script>
        <script src=" {{asset ('/admin/assets/js/pages/crud/forms/widgets/select2.js') }}"></script>
        <script src="{{asset ('/admin/assets/js/pages/crud/file-upload/dropzonejs.js') }}"></script>
        <script src=" {{asset ('admin/assets/js/pages/crud/forms/editors/summernote.js') }}"></script>
		<script src="{{asset('/admin/assets/js/pages/widgets.js')}}"></script>








        @stack('scripts')






   <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js" integrity="sha512-7bS2beHr26eBtIOb/82sgllyFc1qMsDcOOkGK3NLrZ34yTbZX8uJi5sE0NNDYFNflwx1TtnDKkEq+k2DCGfb5w==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(window).ready(function(){
      $('.dd').nestable({ maxDepth: 10 });
      $('.btn-save-nestable').click(function(){
        var $this = $(this);
        $.post("/{{ app()->getLocale() }}/admin/sections/arrange", {orderArr: $('.dd').nestable('serialize'),
            '_token': "{{ csrf_token() }}"}, function(data){
          $('.dd').confirmChange( () => true);
        });
//   $this.button('reset');
      });
      $('.glyphicon').mousedown(function(e){
        e.stopPropagation();
      });
    });
  </script>
 <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

 <script>
 $('#confirm-delete').on('show.bs.modal', function (e) {
     $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
 });
 $(".button_je").on('click', function () {
   var parent_li = $(this).parent().parent();
   parent_li.toggleClass('opened');
 });
 $(".button_je").on('click', function () {
   $(this).toggleClass('rotate');
 });
 </script>
