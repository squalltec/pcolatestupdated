$(function() {
	// "use strict";


// chart 1
var options = {
	series: [{
		name: "Total Orders",
		data: [240, 160, 671, 414, 555, 257]
	}],
	chart: {
		type: "line",
		//width: 100%,
		height: 40,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#CE3435"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#CE3435"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	colors: ["#CE3435"],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();



// chart 2
var options = {
	series: [{
		name: "Total Views",
		data: [400, 555, 257, 640, 460, 671, 350]
	}],
	chart: {
		type: "bar",
		//width: 100%,
		height: 40,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#CE3435"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#CE3435"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	colors: ["#CE3435"],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  chart.render();



// chart 3
var options = {
	series: [{
		name: "Revenue",
		data: [240, 160, 555, 257, 671, 414]
	}],
	chart: {
		type: "line",
		//width: 100%,
		height: 40,
		toolbar: {
			show: !1
		},
		zoom: {
			enabled: !1
		},
		dropShadow: {
			enabled: 0,
			top: 3,
			left: 14,
			blur: 4,
			opacity: .12,
			color: "#CE3435"
		},
		sparkline: {
			enabled: !0
		}
	},
	markers: {
		size: 0,
		colors: ["#CE3435"],
		strokeColors: "#fff",
		strokeWidth: 2,
		hover: {
			size: 7
		}
	},
	plotOptions: {
		bar: {
			horizontal: !1,
			columnWidth: "35%",
			endingShape: "rounded"
		}
	},
	dataLabels: {
		enabled: !1
	},
	stroke: {
		show: !0,
		width: 2.5,
		curve: "smooth"
	},
	colors: ["#CE3435"],
	xaxis: {
		categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
	},
	fill: {
		opacity: 1
	},
	tooltip: {
		theme: "dark",
		fixed: {
			enabled: !1
		},
		x: {
			show: !1
		},
		y: {
			title: {
				formatter: function(e) {
					return ""
				}
			}
		},
		marker: {
			show: !1
		}
	}
  };

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();



// chart 5

var options = {
    series: [{
        name: "Revenue",
		data: [240, 460, 171, 657, 160, 471, 340, 230, 458, 98]
    }],
    chart: {
         type: "area",
       // width: 130,
	    stacked: true,
        height: 280,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#CE3435"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#CE3435"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
	grid: {
		row: {
			colors: ["transparent", "transparent"],
			opacity: .2
		},
		borderColor: "#f1f1f1"
	},
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "25%",
            //endingShape: "rounded"
        }
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: [2.5],
		//colors: ["#3461ff"],
        curve: "smooth"
    },
	fill: {
		type: 'gradient',
		gradient: {
		  shade: 'light',
		  type: 'vertical',
		  shadeIntensity: 0.5,
		  gradientToColors: ['#CE3435'],
		  inverseColors: false,
		  opacityFrom: 0.5,
		  opacityTo: 0.1,
		 // stops: [0, 100]
		}
	},
	colors: ["#CE3435"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
	grid:{
		show: true,
		borderColor: 'rgba(66, 59, 116, 0.15)',
	},
	responsive: [
		{
		  breakpoint: 1000,
		  options: {
			chart: {
				type: "area",
			   // width: 130,
				stacked: true,
			}
		  }
		}
	  ],
	legend: {
		show: false
	  },
    tooltip: {
        theme: "dark"        
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart5"), options);
  chart.render();


  
// chart6

  var chart = new Chart(document.getElementById('chart6'), {
	type: 'doughnut',
	data: {
		labels: ["Mobile", "Desktop", "Tablet"],
		datasets: [{
			label: "Device Users",
			backgroundColor: ["#F57C7C", "#CE3435", "#F9C6C6"],
			data: [2478, 5267, 1834]
		}]
	  },
	options: {
		maintainAspectRatio: false,
		cutoutPercentage: 85,
		responsive: true,
	  legend: {
		display: false
	  }
	}
  });


  
   


// worl map

// jQuery('#geographic-map').vectorMap(
// 	{
// 		map: 'world_mill_en',
// 		backgroundColor: 'transparent',
// 		borderColor: '#818181',
// 		borderOpacity: 0.25,
// 		borderWidth: 1,
// 		zoomOnScroll: false,
// 		color: '#009efb',
// 		regionStyle : {
// 			initial : {
// 			  fill : '#3461ff'
// 			}
// 		  },
// 		markerStyle: {
// 		  initial: {
// 					r: 9,
// 					'fill': '#fff',
// 					'fill-opacity':1,
// 					'stroke': '#000',
// 					'stroke-width' : 5,
// 					'stroke-opacity': 0.4
// 					},
// 					},
// 		enableZoom: true,
// 		hoverColor: '#009efb',
// 		markers : [{
// 			latLng : [21.00, 78.00],
// 			name : 'Lorem Ipsum Dollar'
		  
// 		  }],
// 		hoverOpacity: null,
// 		normalizeFunction: 'linear',
// 		scaleColors: ['#b6d6ff', '#005ace'],
// 		selectedColor: '#c9dfaf',
// 		selectedRegions: [],
// 		showTooltip: true,
// 	});





    
});