<script>
$(document).ready(function () {
    $.ajax({
        url: "{{ route('admin.dashboard-data.user') }}",
        type: "GET",
        dataType: "json",
        success: function(data){
            var myCircle = Circles.create({
            id:                  'circles-user',
            radius:              60,
            value:               data,
            maxValue:            100,
            width:               10,
            text:                function(value){return value},
            colors:              ['#D3B6C6', '#483D8B'],
            duration:            400,
            wrpClass:            'circles-wrp',
            textClass:           'circles-text',
            valueStrokeClass:    'circles-valueStroke',
            maxValueStrokeClass: 'circles-maxValueStroke',
            styleWrapper:        true,
            styleText:           true
            });
        }
    });

    $.ajax({
        url: "{{ route('admin.dashboard-data.admin') }}",
        type: "GET",
        dataType: "json",
        success: function(data){
            var myCircle = Circles.create({
            id:                  'circles-admin',
            radius:              60,
            value:               data,
            maxValue:            100,
            width:               10,
            text:                function(value){return value},
            colors:              ['#D3B6C6', '#483D8B'],
            duration:            400,
            wrpClass:            'circles-wrp',
            textClass:           'circles-text',
            valueStrokeClass:    'circles-valueStroke',
            maxValueStrokeClass: 'circles-maxValueStroke',
            styleWrapper:        true,
            styleText:           true
            });
        }
    });

    $.ajax({
        url: "{{ route('admin.dashboard-data.banned') }}",
        type: "GET",
        dataType: "json",
        success: function(data){
            var myCircle = Circles.create({
            id:                  'circles-banned',
            radius:              60,
            value:               data,
            maxValue:            100,
            width:               10,
            text:                function(value){return value},
            colors:              ['#D3B6C6', '#483D8B'],
            duration:            400,
            wrpClass:            'circles-wrp',
            textClass:           'circles-text',
            valueStrokeClass:    'circles-valueStroke',
            maxValueStrokeClass: 'circles-maxValueStroke',
            styleWrapper:        true,
            styleText:           true
            });
        }
    });
});
</script>
