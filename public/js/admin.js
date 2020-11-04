

// Setup graph
var chart = AmCharts.makeChart('chartdiv00',
	{
		"type": "serial",
		"categoryField": "category",
		"columnWidth": 0.7,
		"dataDateFormat": "",
		"plotAreaBorderColor": "#000000",
		"startDuration": 1,
		"startEffect": "easeOutSine",
		"sequencedAnimation": false,
		"addClassNames": true,
		"backgroundColor": "#FFFFFF",
		"hideBalloonTime": 152,
		"panEventsEnabled": false,
		"percentPrecision": 1,
		"theme": "dark",
		"color": "rgba(17,17,15,0.81)",
		"colors": [
				"#000000"
			],

		"categoryAxis": {
			"autoRotateAngle": 0,
			"classNameField": "",
			"labelColorField": "",
			"axisAlpha": 0.31,
			"dashLength": 0,
			"fontSize": 15,
			"gridCount": 0,
			"gridThickness": 0,
			"labelOffset": 5,
			"minHorizontalGap": 73,
			"tickLength": 0
		},
		"trendLines": [],
		"graphs": [
			{
				"colorField": "#000000",
				"fillAlphas": 1,
				"id": "AmGraph-1",
				"lineColorField": "color",
				"title": "graph 1",
				"type": "column",
				"valueField": "gain",
				"yearField": "category",
				"labelPosition": "inside",
				"color": "#FFFFFF",
				"balloonText": "[[value]]"
			}
		],
		"guides": [],
		"valueAxes": [
			{
				"id": "ValueAxis-1",
				"autoGridCount": false,
				"titleBold": false,
				"minimum": 0,
				"maximum": 20,
				"color":"#424242",
				"labelsEnabled": false
			}
		],
		"AmLegend": [
			{
				"fillColor":"#424242",
				"fillAlpha":"1",
			}
		],
		"allLabels": [],
		"balloon": {},
		"titles": [
			{
				"id": "Title-1",
				"text": "General status by course"
			}
		],
		"chartCursor": [
		{
			"cursorAlpha": 0,
		}
		],
		"dataProvider": [

      ]
	}
);

let labels = [];
let data  = []

courses.map((course,key)=>{
	// console.log(course);
	// chart.dataProvider[key] = {category:course.name}
	// console.log(chart.dataProvider[key])

	labels.push(course.name);
	data.push(course.job.length);
})

console.log(success)

var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',
	
    // The data for our dataset
    data: {
        labels: labels,
        datasets: [{
            label: 'General status by course',
			backgroundColor: 'rgb(255, 99, 132)',
			borderWidth: 1,
            borderColor: 'rgb(255, 99, 132)',
            data: data
        }]
    },

    // Configuration options go here
    options: {}
});

// console.log(chart.dataProvider)


// chart.addListener( "rendered", updateHiLo);

$(function(){
	if ($('.data-row').find() == true) {
		updateGraph();
	}
});

function updateGraph() {

	if( document.getElementById('data-set').value == 'job' ) {
		let arr = [];
		// chart.data.labels = []
		// chart.data.datasets = [];
		chart.data.datasets[0].data.splice(0, 4)
		console.log(chart.data.datasets[0].data)
          courses.map((course,key) => {
			//   chart.dataProvider[key].gain = course.job.length
			chart.data.datasets.forEach((dataset, index) => {
				// chart.data.labels.push(course.name);
				// dataset.data[index] = course.job.length
				dataset.data.push(course.job.length);
			})
		  })
	}
	else if ( document.getElementById('data-set').value == 'student' ) {
			// chart.data.labels = []
			chart.data.datasets[0].data.splice(0, 4)
            courses.map((course,key) => {
			// chart.dataProvider[key].gain = course.user.length
			chart.data.datasets.forEach((dataset, index) => {
				// chart.data.labels.push(course.name);
				// dataset.data[index] = course.user.length
				dataset.data.push(course.user.length);
			})
			// data.push(course.user.length)
        })
	}
	else if ( document.getElementById('data-set').value == 'success' ) {
		data = [];
		chart.data.datasets[0].data.splice(0, 4)
        courses.map((course,keyC) => {
			// chart.data.labels.push(course.name);
            success.map((bingo,key) => {
                if(course.id == bingo.user.course_id)
				// chart.dataProvider[keyC].gain = success.length
				chart.data.datasets.forEach((dataset) => {
					dataset.data.push(success.length);
				})
				// data.push(success.length);
            })
        })
	}

	chart.update();  // Resets animation
  // Animate between values instead of resetting animation??

	// updateHiLo(); // updates highest and lowest values
	// chart.validateData(); // redraws the chart with new data
}


function addCategory(elem){
    let input =  document.createElement('input');
    input.setAttribute('type','text')
    input.placeholder = 'add Category...'
    input.style.marginTop = '1rem';
    input.classList = 'form-control text-capitalize mt-2 category'
    document.getElementById('parentCategories').appendChild(input)
}

function animatePluse() {
    document.querySelector('.fa-plus-square').classList += 'wobble-hor-bottom';
}
function createNewCourse(e) {
    const err = document.querySelector('.errorMessage');
    err.textContent = '';
    const allCategories = document.querySelectorAll('.category');
    const categories = [];
    allCategories.forEach((category,key) => {
        if(category.value.length  > 1 ){
            categories[key] = category.value
        }
    })
    const courseName = document.getElementById('course');

    if(categories.length < 2 ){
        err.textContent = 'you must add minimum 2 categories'
    }else if(courseName.value.length < 2 ){
        err.textContent = 'you must add  2 characters to course name'
    }else{
        let url = location.origin + '/createCourse';
        let courseNameValue = document.getElementById('course').value;
        axios({method:'post',url:url,data:{course:courseNameValue,categories:categories}}).then(({data})=>{
            if(data === 'something faild'){
                Swal.fire("Error 500", "something faild please try again :(", "error");
            }else{
                Swal.fire("success Creating", "good job :)", "success").then(()=>{
                    location.reload();
                });
            }
        })
    }

}
function disabled(userId,jobId){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: `Are you sure ?`,
        text:  'disabled this profile student and job post?:( ! ',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, Disabled it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            let url = location.origin + '/disabled';
            axios({method:'post',url: url,
                data:{
                    userId:userId,
                    jobId:jobId,
                }}).then(({data})=>{
                Swal.fire({title: 'success Updated!',text: `${data}!`,icon: 'success'})
                location.reload()
            });
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your category is safe :)',
                'error'
            )
        }
    })
}
