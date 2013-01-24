jQuery(document).ready(function() {
	
	/******************************************************************************************************
	 * DataTables initialization
	 * A regular initialization wouldn't make me feel sophisticated,so here we have a "parameterized" 
	 * initiliaztion. Basically, we can use the classes assigned to a datatable to control it's behavior
	 * instead of jumping back and editing this file everytime we need something changed.
	 *
	 *	Class				|	Attribute																														|	Parameter Name
	 *	---------------------------------------------------------------------------------------------------
	 *  sorted			|	Controls sorting, if present, the data will NOT be sorted						|	bSortable
	 *							| This assumes that the data is ALREADY sorted by the server, and so	|
	 *							| disables initial sorting to prevent tampering.											|
	 *	---------------------------------------------------------------------------------------------------
	 * 	filtered		|	If not present, searching is disabled																|	bFilter
	 *
	 * The configuration variables are stored in a configString Object. Yes, I know, it's not a string
	 * it's an object. But...it's named that for 'Historical' (lol) reasons. Anyway, the idea is to 
	 * populate the configString with the appropriate values based on the classes assigned to the table
	 * and then initialize dataTables with the object.
	 ******************************************************************************************************/
	$('table').each(function() {
		var configString = {};

		configString['bSort']			= ( $(this).hasClass("sorted") ? [[]] : '' );
		configString['bFilter'] 	= $(this).hasClass("filtered");
		configString['bInfo'] 		= $(this).hasClass("info");
		configString['bPaginate']	= $(this).hasClass("paginate");

		$(this).dataTable(configString);
	});
});