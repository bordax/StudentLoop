app.controller('alunosController', function($filter, $scope, $http, API_URL) {
    
    //Lista alunos
    $http.get(API_URL + "alunos")
            .success(function(response) {
                $scope.alunos = response;
            });
    
    // Exibe o formulário em um modal
    $scope.toggle = function(modalstate, id) {
        console.log('Function toggle, modalstate: '+modalstate+', id: '+id);
        $scope.modalstate = modalstate;

        switch (modalstate) {
            case 'add':
                //Limpa os campos
                $('#nome').val('');
                $('#serie').val('');
                $('#data_nasc').val('');
                $('#rua').val('');
                $('#bairro').val('');
                $('#complemento').val('');
                $('#cep').val('');
                $('#numero_endereco').val('');
                $('#cidade').val('');
                $('#estado').val('');
                $('#cpf').val('');
                $('#nome_mae').val('');
                $('#venc').val('');

                $scope.form_title = "Adicionar novo aluno";
                break;
            case 'edit':
                $scope.form_title = "Detalhes do aluno";
                $scope.id = id;
                $http.get(API_URL + 'alunos/' + id)
                        .success(function(response) {
                            console.log(response);
                            $scope.aluno = response;
                            $scope.aluno.nasc = new Date(new Date($scope.aluno.nasc).getTime() + (60*60*24*1000))
                        });
                break;
            default:
                break;
        }
        console.log(id);
        $('#myModal').modal('show');
    }


    // Salva novo registro / Edita registro existente
    $scope.save = function(modalstate, id) {
        var url = API_URL + "alunos";
        
        // acrescenta na URL o id do contato se o formulário estiver no modo de edição
        if (modalstate === 'edit'){
            url += "/" + id;
        }
        $scope.aluno.nasc = $filter('date')($scope.aluno.nasc, "yyyy-MM-dd");
        $http({
            method: 'POST',
            url: url,
            data: $.param($scope.aluno),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function(response) {
            console.log(response);
            location.reload();
        }).error(function(response) {
            console.log(response);
            alert('Erro');
        });
    }


    // Excluir registro
    $scope.confirmDelete = function(id) {
        var isConfirmDelete = confirm('Deseja excluir o registro '+id+'?');
        if (isConfirmDelete) {
            $http({
                method: 'DELETE',
                url: API_URL + 'alunos/' + id
            }).
                    success(function(data) {
                        console.log(data);
                        location.reload();
                    }).
                    error(function(data) {
                        console.log(data);
                        alert('Erro ao excluir.');
                    });
        } else {
            return false;
        }
    }
});