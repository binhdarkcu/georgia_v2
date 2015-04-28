// Modular doughnut
	(function(){
	var data = [],
		barsCount = 50,
		labels = new Array(barsCount),
		updateDelayMax = 500,
		$id = function(id){
			return document.getElementById(id);
		},
		random = function(max){ return Math.round(Math.random()*100)},
		helpers = Chart.helpers;


		//char1
		var canvas = $id('modular-doughnut'),
			colours = {
				"Aannemer": "#e22b2b",
				"Architect": "#fe7633",
				"Bank & Verzekering": "#4b7152",
				"Energie": "#a46f40",
				"Advocaat": "#5c4173",
				"Ontwikkelaar": "#cc9603",
				"Ingenieur": "#5ae7d8",
				"Makelaar": "#4e6d9c",
				"Politiek":"#b37976",
				"Andere":"#7abf94"
			};

		var moduleData = [
		
			{
				value: 6.57,
				color: colours["Aannemer"],
				highlight: Colour(colours["Aannemer"], 10),
				label: "Aannemer"
			},
		
			{
				value: 1.63,
				color: colours["Architect"],
				highlight: Colour(colours["Architect"], 10),
				label: "Architect"
			},
		
			{
				value: 1.09,
				color: colours["Bank & Verzekering"],
				highlight: Colour(colours["Bank & Verzekering"], 10),
				label: "Bank & Verzekering"
			},
		
			{
				value: 1.71,
				color: colours["Energie"],
				highlight: Colour(colours["Energie"], 10),
				label: "Energie"
			},
		
			{
				value: 1.64,
				color: colours["Advocaat"],
				highlight: Colour(colours["Advocaat"], 10),
				label: "Advocaat"
			},
		
			{
				value: 1.37,
				color: colours["Ontwikkelaar"],
				highlight: Colour(colours["Ontwikkelaar"], 10),
				label: "Ontwikkelaar"
			},
			{
				value: 1.71,
				color: colours["Ingenieur"],
				highlight: Colour(colours["Ingenieur"], 10),
				label: "Ingenieur"
			},
			{
				value: 1.64,
				color: colours["Makelaar"],
				highlight: Colour(colours["Makelaar"], 10),
				label: "Makelaar"
			},
			{
				value: 1.37,
				color: colours["Politiek"],
				highlight: Colour(colours["Politiek"], 10),
				label: "Politiek"
			},
			{
				value: 1.37,
				color: colours["Andere"],
				highlight: Colour(colours["Andere"], 10),
				label: "Andere"
			}
		];
		// 
		var moduleDoughnut = new Chart(canvas.getContext('2d')).Doughnut(moduleData, { 
			segmentStrokeColor : "#000",
			tooltipTemplate : "<%if (label){%><%=label%>: <%}%><%= value %>kb", animation: false }
		);
		// 
		var legendHolder = document.createElement('div');
		legendHolder.innerHTML = moduleDoughnut.generateLegend();
		// Include a html legend template after the module doughnut itself
		helpers.each(legendHolder.firstChild.childNodes, function(legendNode, index){
			helpers.addEvent(legendNode, 'mouseover', function(){
				var activeSegment = moduleDoughnut.segments[index];
				activeSegment.save();
				activeSegment.fillColor = activeSegment.highlightColor;
				moduleDoughnut.showTooltip([activeSegment]);
				activeSegment.restore();
			});
		});
		helpers.addEvent(legendHolder.firstChild, 'mouseout', function(){
			moduleDoughnut.draw();
		});
		canvas.parentNode.parentNode.appendChild(legendHolder.firstChild);
		
		//chart 2
		var canvas_2 = $id('modular-doughnut-2'),
			colours = {
				"Vlaams-Brabant": "#e22b2b",
				"Waals-Brabant": "#fe7633",
				"Henegouwen": "#4b7152",
				"Luik": "#a46f40",
				"Namen": "#5c4173",
				"West-Vlaanderen": "#cc9603",
				"Oost-Vlaanderen": "#5ae7d8",
				"Limburg": "#4e6d9c",
				"Antwerpen":"#b37976",
				"Luxemburg":"#7abf94"
			};

		var moduleData = [
		
			{
				value: 1.57,
				color: colours["Vlaams-Brabant"],
				highlight: Colour(colours["Vlaams-Brabant"], 10),
				label: "Vlaams-Brabant"
			},
		
			{
				value: 1.63,
				color: colours["Waals-Brabant"],
				highlight: Colour(colours["Waals-Brabant"], 10),
				label: "Waals-Brabant"
			},
		
			{
				value: 1.09,
				color: colours["Henegouwen"],
				highlight: Colour(colours["Henegouwen"], 10),
				label: "Henegouwen"
			},
		
			{
				value: 1.71,
				color: colours["Luik"],
				highlight: Colour(colours["Luik"], 10),
				label: "Luik"
			},
		
			{
				value: 6.64,
				color: colours["Namen"],
				highlight: Colour(colours["Namen"], 10),
				label: "Namen"
			},
		
			{
				value: 1.37,
				color: colours["West-Vlaanderen"],
				highlight: Colour(colours["West-Vlaanderen"], 10),
				label: "West-Vlaanderen"
			},
			{
				value: 1.71,
				color: colours["Oost-Vlaanderen"],
				highlight: Colour(colours["Oost-Vlaanderen"], 10),
				label: "Oost-Vlaanderen"
			},
			{
				value: 1.64,
				color: colours["Limburg"],
				highlight: Colour(colours["Limburg"], 10),
				label: "Limburg"
			},
			{
				value: 1.37,
				color: colours["Antwerpen"],
				highlight: Colour(colours["Antwerpen"], 10),
				label: "Antwerpen"
			},
			{
				value: 1.37,
				color: colours["Luxemburg"],
				highlight: Colour(colours["Luxemburg"], 10),
				label: "Luxemburg"
			}
		];
		// 
		var moduleDoughnut_2 = new Chart(canvas_2.getContext('2d')).Doughnut(moduleData, { 
			segmentStrokeColor : "#000",
			tooltipTemplate : "<%if (label){%><%=label%>: <%}%><%= value %>kb", animation: false }
		);
		// 
		var legendHolder_2 = document.createElement('div');
		legendHolder_2.innerHTML = moduleDoughnut_2.generateLegend();
		// Include a html legend template after the module doughnut itself
		helpers.each(legendHolder_2.firstChild.childNodes, function(legendNode, index){
			helpers.addEvent(legendNode, 'mouseover', function(){
				var activeSegment = moduleDoughnut_2.segments[index];
				activeSegment.save();
				activeSegment.fillColor = activeSegment.highlightColor;
				moduleDoughnut_2.showTooltip([activeSegment]);
				activeSegment.restore();
			});
		});
		helpers.addEvent(legendHolder_2.firstChild, 'mouseout', function(){
			moduleDoughnut_2.draw();
		});
		canvas_2.parentNode.parentNode.appendChild(legendHolder_2.firstChild);
		
		function Colour(col, amt) {

			var usePound = false;
	
			if (col[0] == "#") {
				col = col.slice(1);
				usePound = true;
			}
	
			var num = parseInt(col,16);
	
			var r = (num >> 16) + amt;
	
			if (r > 255) r = 255;
			else if  (r < 0) r = 0;
	
			var b = ((num >> 8) & 0x00FF) + amt;
	
			if (b > 255) b = 255;
			else if  (b < 0) b = 0;
	
			var g = (num & 0x0000FF) + amt;
	
			if (g > 255) g = 255;
			else if (g < 0) g = 0;
	
			return (usePound?"#":"") + (g | (b << 8) | (r << 16)).toString(16);
	
		}
	})();