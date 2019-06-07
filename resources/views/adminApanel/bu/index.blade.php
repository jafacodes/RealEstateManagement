@extends('adminApanel.layouts.layout')

@section('title')
     التحكم في العقارات
    @endsection

@section('header')
<style rel="stylesheet" type="text/css">
    td , tr , th {
        text-align: center;
    }
</style>
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="page-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>
                التحكم في العقارات
            </h1>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><a href="{{ url('/admin_panel') }}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
                <li class="active"><a href="{{ url('/admin_panel/bu') }}"> التحكم في العقارات </a></li>
            </ul>
        </div>
    </div>


    <!-- Main content -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h3 class="card-title">
                    التحكم في العقارات
                </h3>
                <div class="card-body">
                            <table id="data" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> إسم العقار </th>
                                    <th> السعر </th>
                                    <th> عدد الغرف </th>
                                    <th> إيجار / تمليك </th>
                                    <th> المساحة </th>
                                    <th> النوع </th>
                                    <th> الحالة </th>
                                    <th> المستخدم </th>
                                    <th>أضيف في</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>



                                <!--
                                foreach($users as $user)
                                <tr>
                                    <td>{ $user->id }</td>
                                    <td>{ $user->name }</td>
                                    <td>{ $user->email }</td>
                                    <td>{ $user->created_at}</td>
                                    <td>{ $user->admin == 1 ? 'مدير' : 'عضو'}</td>
                                    <td>
                                        <a style="margin: 5px" href="{ url('admin_panel/users/'.$user->id.'/edit') }"><label class="label label-primary"><i class="fa fa-btn small fa-edit"></i> تعديل </label></a>
                                        <a style="margin: 5px" href="{ url('admin_panel/users/'.$user->id.'/delete') }"><label class="label label-danger"><i class="fa fa-btn small fa-remove"></i> حذف </label></a>
                                    </td>
                                </tr>
                                    endforeach
                                !-->
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th> إسم العقار </th>
                                    <th> السعر </th>
                                    <th> عدد الغرف </th>
                                    <th> إيجار / تمليك </th>
                                    <th> المساحة </th>
                                    <th> النوع </th>
                                    <th> الحالة </th>
                                    <th> المستخدم </th>
                                    <th>أضيف في</th>
                                    <th>التحكم</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

    @endsection


@section('footer')



    <!-- DataTables -->

    {!! Html::script('adminApanel/js/plugins/jquery.dataTables.min.js') !!}
    {!! Html::script('adminApanel/js/plugins/dataTables.bootstrap.min.js') !!}


    <!-- page script -->



            <script type="text/javascript">

                var lastIdx = null;



                var table = $('#data').DataTable({
                    processing: false,
                    serverSide: true,
                    responsive: true,
                    ajax: '/admin_panel/bu/data',
                    columns: [
                        {data: 'id', name: 'id'},
                        {data: 'name', name: 'name'},
                        {data: 'price', name: 'price'},
                        {data: 'rooms', name: 'rooms'},
                        {data: 'rent', name: 'rent'},
                        {data: 'square', name: 'square'},
                        {data: 'type', name: 'type'},
                        {data: 'status', name: 'status'},
                        {data: 'user_id', name: 'user_id'},
                        {data: 'created_at', name: 'created_at'},
                        {data: 'action', name: 'action', orderable: false, searchable: false},
                    ]
                ,
                    "language": {
                    "url": "{{ Request::root()  }}/admin/cus/Arabic.json"
                },
                "stateSave": false,
                    "order": [[0, 'desc']],
                    "pagingType": "full_numbers",
                    aLengthMenu: [
                    [5,10,25, 50, 100, 200, -1],
                    [5,10,25, 50, 100, 200, "All"]
                ],
                    iDisplayLength: 5,
                    fixedHeader: true,

                    "oTableTools": {
                    "aButtons": [


                        {
                            "sExtends": "csv",
                            "sButtonText": "ملف اكسل",
                            "sCharSet": "utf16le"
                        },
                        {
                            "sExtends": "copy",
                            "sButtonText": "نسخ المعلومات",
                        },
                        {
                            "sExtends": "print",
                            "sButtonText": "طباعة",
                            "mColumns": "visible",


                        }
                    ],

                        "sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
                },

                "dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
                    ,/*initComplete: function ()
                {
                    var r = $('#data tfoot tr');
                    r.find('th').each(function(){
                        $(this).css('padding', 8);
                    });
                    $('#data thead').append(r);
                    $('#search_0').css('text-align', 'center');
                }*/

                });

                table.columns().eq(0).each(function(colIdx) {
                    $('input', table.column(colIdx).header()).on('keyup change', function() {
                        table
                            .column(colIdx)
                            .search(this.value)
                            .draw();
                    });




                });



                table.columns().eq(0).each(function(colIdx) {
                    $('select', table.column(colIdx).header()).on('change', function() {
                        table
                            .column(colIdx)
                            .search(this.value)
                            .draw();
                    });

                    $('select', table.column(colIdx).header()).on('click', function(e) {
                        e.stopPropagation();
                    });
                });


                $('#data tbody')
                    .on( 'mouseover', 'td', function () {
                        var colIdx = table.cell(this).index().column;

                        if ( colIdx !== lastIdx ) {
                            $( table.cells().nodes() ).removeClass( 'highlight' );
                            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
                        }
                    } )
                    .on( 'mouseleave', function () {
                        $( table.cells().nodes() ).removeClass( 'highlight' );
                    } );


        </script>

@endsection

<!--
var lastIdx = null;

$('#data thead th').each( function () {
if($(this).index()  < 4 ){
var classname = $(this).index() == 6  ?  'date' : 'dateslash';
var title = $(this).html();
$(this).html( '<input type="text" class="' + classname + '" data-value="'+ $(this).index() +'" placeholder=" البحث '+title+'" />' );
}else if($(this).index() == 4){
$(this).html( '<select><option value="0"> عضو </option><option value="1"> مدير الموقع </option></select>' );
}

} );

var table = $('#data').DataTable({
processing: true,
serverSide: true,
ajax: '{{ url('/admin_panel/users/data') }}',
columns: [
{data: 'id', name: 'id'},
{data: 'name', name: 'name'},
{data: 'email', name: 'email'},
{data: 'created_at', name: 'created_at'},
{data: 'admin', name: 'admin'},
//  {data: 'exame', name: 'exame'},
//{data: 'control', name: ''}
],
"language": {
"url": "{{ Request::root()  }}/admin/cus/Arabic.json"
},
"stateSave": false,
"responsive": true,
"order": [[0, 'desc']],
"pagingType": "full_numbers",
aLengthMenu: [
[25, 50, 100, 200, -1],
[25, 50, 100, 200, "All"]
],
iDisplayLength: 25,
fixedHeader: true,

"oTableTools": {
"aButtons": [


{
"sExtends": "csv",
"sButtonText": "ملف اكسل",
"sCharSet": "utf16le"
},
{
"sExtends": "copy",
"sButtonText": "نسخ المعلومات",
},
{
"sExtends": "print",
"sButtonText": "طباعة",
"mColumns": "visible",


}
],

"sSwfPath": "{{ Request::root()  }}/admin/cus/copy_csv_xls_pdf.swf"
},

"dom": '<"pull-left text-left" T><"pullright" i><"clearfix"><"pull-right text-right col-lg-6" f > <"pull-left text-left" l><"clearfix">rt<"pull-right text-right col-lg-6" pi > <"pull-left text-left" l><"clearfix"> '
,initComplete: function ()
{
var r = $('#data tfoot tr');
r.find('th').each(function(){
$(this).css('padding', 8);
});
$('#data thead').append(r);
$('#search_0').css('text-align', 'center');
}

});

table.columns().eq(0).each(function(colIdx) {
$('input', table.column(colIdx).header()).on('keyup change', function() {
table
.column(colIdx)
.search(this.value)
.draw();
});




});



table.columns().eq(0).each(function(colIdx) {
$('select', table.column(colIdx).header()).on('change', function() {
table
.column(colIdx)
.search(this.value)
.draw();
});

$('select', table.column(colIdx).header()).on('click', function(e) {
e.stopPropagation();
});
});


$('#data tbody')
.on( 'mouseover', 'td', function () {
var colIdx = table.cell(this).index().column;

if ( colIdx !== lastIdx ) {
$( table.cells().nodes() ).removeClass( 'highlight' );
$( table.column( colIdx ).nodes() ).addClass( 'highlight' );
}
} )
.on( 'mouseleave', function () {
$( table.cells().nodes() ).removeClass( 'highlight' );
} );
*/

-->