<script>
	(function($){
		/* methode Ajout ID agent */
		$("#formAjoutIDagent").validate({
			rules : {
	        	nom : { 
	        		required: true,
	        		minlength : 2,
	         		maxlength : 100
	        	},
	        	sexe : {
	        		required : true
	        	},
	        	IDagent : {
	        		required : true,
	        		minlength : 1,
	        		maxlength : 100
	        	}
	        },
	        messages: {
	        	nom: {
	        		required : "Le Nom est obligatoire",
	        		minlength : "Le Nom doit avoir au minimun 2 caractère",
        			maxlength : "Le Nom doit avoir au max 100 caractère"
	        	},
	        	sexe : {
	        		required : "Le Sexe est obligatoire",
	        	},
	        	IDagent : {
	        		required : "L'ID agent est obligatoire",
	        		minlength : "L'ID agent doit avoir au minimun 1 caractère",
        			maxlength : "L'ID doit avoir au max 100 caractère"
	        	}
	        },
	        submitHandler: function(form){
	        	let _token = $('input[type="hidden"]').attr('value'); 
	    		let myUrl = $("#formAjoutIDagent").attr('action');
	    		let myMethode = $("#formAjoutIDagent").attr('method');
	    		let nom = $('#nom').val();
	    		let postnom = $('#postnom').val();
	    		let prenom = $('#prenom').val();
	    		let sexe = $('#sexe').val();
	    		let numCarteIdentite = $('#numCarteIdentite').val();
	    		let IDagent = $('#IDagent').val();
	    		console.log(myUrl);
	    		$('#btnStoreIDagent').html("En cours d'enregistrement...");
				$('#btnStoreIDagent').attr('disabled',true);
	    		//console.log(myMethode);
	        	$.ajax({
	        		url:myUrl,
      				method:myMethode,
      				data:{
				    	_token,
				        nom,
				        postnom,
				        prenom,
				        sexe,
				        numCarteIdentite,
				        IDagent
				    },
				    dataType:'json',
				    beforeSend:function(){
				        //console.log('vidange du span');
				        $(document).find('span.error-text').text('');
	    			},
				    success:function(data){
	    				//console.log(data);
	    				if(data.status == 0){
				          console.log(data.error);			          
				          $.each(data.error, function(prefix, val){
				        	console.log("var prefix "+prefix+" ::valeur "+val);
				           	$('span.'+prefix+'_error').text(val[0]);
				          });
				          $('#btnStoreIDagent').html('Enregister');
				          $('#btnStoreIDagent').attr('disabled',false);
				        }
				        else{
				        	if (data.status == 1) {
				        		Swal.fire({
					              icon: 'success',
					              title: "<h6 class='bg-dangerM fs-4'>Enregistrement effectué avec success</h6>",
					              
					            }).then((result) => {
					            	if(result.isConfirmed){
					            		window.location.reload();
					            	}
					            });
				        		/*$('input[type=text]').val('');
				        	    console.log(data.messageSucces);
						        alert(data.messageSucces);
						        $('#btnStoreIDagent').html('Enregister');
						        $('#btnStoreIDagent').attr('disabled',false);
						    	window.location.reload();*/
						    }else{
						    	alert("Probleme lié au formulaire ou autre");
						    }
				        }
	    			},
	    			error:function(error){
			        	console.log(error.responseText);
			        	alert('Error sur le serveur 500');
		    		}
	        	});
	        }
		});
		/* /End methode Ajout ID agent */

		/* methode Delete agent */
		$('.btnDeleteIDagent').on('click', function(event){
			event.preventDefault();
			let getId = $(this).attr('id');
			let myUrl = $(this).attr('href');
			console.log(myUrl);
			swal.fire({
				title: 'Suppression',
				text: 'voulez-vous vraiment supprimer cette agent',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: 'rgb(0, 121, 98)',
				cancelButtonColor: '#d33',
				cancelButtonText: 'Annuler',
				confirmButtonText: 'supprimer Agent',
			}).then((result) => {
				if(result.isConfirmed){
					//swal.fire('suppression OK OK');
					$.ajax({
						url: myUrl,
						method: 'GET',
						data: {
							Id: getId,
							_token: '{{csrf_token()}}'
						},
						success: function(response) {
							//console.log(response);
							if (response.status == 0) {
								Swal.fire({
									icon: 'error',
									title: 'Error...',
									text: 'Error lors de la suppression!',
								})
							}else{
								if (response.status == 1) {
									swal.fire(
										'suppression!',
										'Agent suppremer avec success!',
										'success'
									);
									window.location.reload();
								}else{
									swal.fire('verifier il ya une error sur le serve');
								}
							}
						}
					});
				}
			});			
		});
		/* /End methode Delete agent */

		/* methode Modif agent */
		$('.btnModifAgent').on('click', function(event){
			event.preventDefault();
			let getId = $(this).attr('id');
			let myUrl = $(this).attr('href');
			//console.log(myUrl);
			$.ajax({
				url: myUrl,
				method: 'GET',
				success: function(response) {
					if (response.status == 0) {
						$('#formModiftAgent').modal('hide');
						Swal.fire({
							icon: 'error',
							title: 'Error...',
							text: response.error,
						})
					}else if(response.status == 1){
						//console.log(response.donnes);
						$('#nomModif').val(response.donnes.nom);
						$('#postnomModif').val(response.donnes.postnom);
						$('#prenomModif').val(response.donnes.prenom);
						$('#sexeModif').val(response.donnes.sexe);
						$('#numCarteIdentiteModif').val(response.donnes.numcarteidentite);
						$('#IDagentModif').val(response.donnes.idagent);
						$('#myId').val(response.donnes.id);
					}else{
						Swal.fire({
							icon: 'error',
							title: 'Error...',
							text: "Error sur le SERVER",
						})
					}
				}
			});
		});
		/* /End methode Modif agent  */

		/* methode Save Modif ID agent */
		$("#formModiftAgentSend").validate({
			rules : {
				myId : {
					required: true
				},
	        	nomModif : { 
	        		required: true,
	        		minlength : 2,
	         		maxlength : 100
	        	},
	        	sexeModif : {
	        		required : true
	        	},
	        	IDagentModif : {
	        		required : true,
	        		minlength : 1,
	        		maxlength : 100
	        	}
	        },
	        messages: {
	        	myId : {
	        		required : "Le num ID est obligatoire"
	        	},
	        	nomModif : {
	        		required : "Le Nom est obligatoire",
	        		minlength : "Le Nom doit avoir au minimun 2 caractère",
        			maxlength : "Le Nom doit avoir au max 100 caractère"
	        	},
	        	sexeModif : {
	        		required : "Le Sexe est obligatoire",
	        	},
	        	IDagentModif : {
	        		required : "L'ID agent est obligatoire",
	        		minlength : "L'ID agent doit avoir au minimun 1 caractère",
        			maxlength : "L'ID doit avoir au max 100 caractère"
	        	}
	        },
	        submitHandler: function(form){
	        	let _token = $('input[type="hidden"]').attr('value'); 
	    		let myUrl = $("#formModiftAgentSend").attr('action');
	    		let myMethode = $("#formModiftAgentSend").attr('method');
	    		let nomModif = $('#nomModif').val();
	    		let postnomModif = $('#postnomModif').val();
	    		let prenomModif = $('#prenomModif').val();
	    		let sexeModif = $('#sexeModif').val();
	    		let numCarteIdentiteModif = $('#numCarteIdentiteModif').val();
	    		let IDagentModif = $('#IDagentModif').val();
	    		let myId = $('#myId').val();
	    		console.log(myUrl);
	    		$('#btnModifIDagent').html("En cours de modification...");
				$('#btnModifIDagent').attr('disabled',true);
	    		//console.log(myMethode);
	        	$.ajax({
	        		url:myUrl,
      				method: "put",
      				data:{
				    	_token,
				        nomModif,
				        postnomModif,
				        prenomModif,
				        sexeModif,
				        numCarteIdentiteModif,
				        IDagentModif,
				        myId
				    },
				    dataType:'json',
				    beforeSend:function(){
				        //console.log('vidange du span');
				        $(document).find('span.error-text').text('');
	    			},
				    success:function(data){
	    				//console.log(data);
	    				if(data.status == 0){
				          console.log(data.error);			          
				          $.each(data.error, function(prefix, val){
				        	console.log("var prefix "+prefix+" ::valeur "+val);
				           	$('span.'+prefix+'_error').text(val[0]);
				          });
				          $('#btnModifIDagent').html('Enregister');
				          $('#btnModifIDagent').attr('disabled',false);
				        }
				        else{
				        	if (data.status == 1) {
				        		Swal.fire({
					              icon: 'success',
					              title: "<h6 class='bg-dangerM fs-4'>Modification effectué avec success</h6>",
					              
					            }).then((result) => {
					            	if(result.isConfirmed){
					            		window.location.reload();
					            	}
					            });
				        		/*$('input[type=text]').val('');
				        	    console.log(data.messageSucces);
						        alert(data.messageSucces);
						        $('#btnStoreIDagent').html('Enregister');
						        $('#btnStoreIDagent').attr('disabled',false);
						    	window.location.reload();*/
						    }else{
						    	alert("Probleme lié au formulaire ou autre");
						    }
				        }
	    			},
	    			error:function(error){
			        	console.log(error.responseText);
			        	alert('Error sur le serveur 500');
		    		}
	        	});
	        }
		});
		/* /End methode Save Modif ID agent */
	})(jQuery);
</script>