jQuery(document).ready(function() {
	/*
	 * DataTables initialization
	 * A regular initialization wouldn't make me feel sophisticated,
	 * so here we have a "parameterized" initiliaztion. Basically, we can use 
	 * the classes assigned to a datatable to control it's behavior instead
	 * jumping back and editing this file everytime we need something changed.
	 *
	 *	Class				|	Attribute																														|	Parameter Name
	 *  Sortable		|	Enables sorting on a datatable, otherwise disabled it								|	bSortable
	 * 	Listing			|	Used for simple tables, disables searching and footer information		|	
	 *
	 */
	$('table').each(function() {
		$(this).dataTable();
	});
});