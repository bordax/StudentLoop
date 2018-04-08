<!DOCTYPE html>
	<html lang="pt-BR" ng-app="student_loop">
	    <head>
	        <title>Student Loop</title>
	
	        <!-- Load Bootstrap CSS -->
	        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

	    </head>
	    <body>        
	        <div ng-controller="alunosController">
	
	            <div class="container">
	                <h2>Dados de alunos</h2>
	                <!-- Tabela-para-carregar-os-dados -->
	                <table class="table ">
	                    <thead>
	                        <tr>
	                            <th>ID</th>
	                            <th>Nome</th>
	                            <th>Data de Nascimento</th>
	                            <th>Série</th>
	                            <th>Endereço</th>
	                            <th>Dados da mãe</th>
	                            <th>Dia do Vencimento</th>
	                            <th><button id="btn-add" class="btn btn-primary btn-xs" ng-click="toggle('add', 0)">Adicionar novo aluno</button></th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                        <tr ng-repeat="aluno in alunos">
	                            <td>{{ aluno.id }}</td>
	                            <td>{{ aluno.nome }}</td>
	                            <td>{{ aluno.nasc }}</td>
	                            <td>{{ aluno.serie }}º ano</td>
	                            <td>{{ aluno.rua }}, {{ aluno.numero_endereco }}<br>{{aluno.bairro}}<br ng-if='aluno.complemento'>{{ aluno.complemento }}<br>{{ aluno.cidade }} - {{ aluno.estado }}<br>{{ aluno.cep }}</td>
	                            <td>{{ aluno.nome_mae }}<br>{{ aluno.cpf }}<br></td>
	                            <td>{{ aluno.venc}}</td>
	                            <td>
	                                <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', aluno.id)">Editar</button>
	                                <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(aluno.id)">Excluir</button>
	                            </td>
	                        </tr>
	                    </tbody>
	                </table>
	            </div>
	            <!-- Final da Tabela-para-carregar-os-dados -->
	            <!-- Modal (Pop up quando o botão de detalhes é clicado) -->
	            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	                <div class="modal-dialog">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
	                            <h4 class="modal-title" id="myModalLabel">{{form_title}}</h4>
	                        </div>
	                        <div class="modal-body">
	                            <form name="frmAlunos" class="form-horizontal" novalidate>
	
	                                <div class="form-group error">
	                                    <label for="inputEmail3" class="col-sm-3 control-label">Nome</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control has-error" id="nome" name="nome" placeholder="Nome completo" value="{{nome}}" maxlength="100"
	                                        ng-model="aluno.nome" ng-required="true">
	                                        <span class="help-inline"
	                                        ng-show="frmAlunos.nome.$invalid && frmAlunos.nome.$touched">Nome é obrigatório.</span>
	                                    </div>
	                                </div>
	
	                                <div class="form-group">
	                                    <label for="serie" class="col-sm-3 control-label">Série</label>
	                                    <div class="col-sm-9">
	                                         <select id="serie" name="serie" ng-model="aluno.serie" ng-required="true">
  												<option value="1" selected="selected">1º ano</option>
  												<option value="2">2º ano</option>
  												<option value="3">3º ano</option>
  												<option value="4">4º ano</option>
  												<option value="5">5º ano</option>
  												<option value="6">6º ano</option>
  												<option value="7">7º ano</option>
  												<option value="8">8º ano</option>
  												<option value="9">9º ano</option>
											</select> 
	                                    </div>
	                                </div>
	
	                                <div class="form-group">
	                                    <label for="data_nasc" class="col-sm-3 control-label">Data de Nascimento</label>
	                                    <div class="col-sm-9">
	                                        <input type="date" class="form-control" id="data_nasc" name="data_nasc" placeholder="Data de Nascimento" min="2000-01-01"value="{{data_nasc}}"
	                                        ng-model="aluno.nasc" ng-required="true">
	                                    </div>
	                                </div>

									<h3>Endereço</h3>
	                                
	                                <div class="form-group">
	                                    <label for="cep" class="col-sm-3 control-label">CEP</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="cep" name="cep" placeholder="CEP" value="{{cep}}" maxlength="8"
	                                        ng-model="aluno.cep" ng-required="true">
	                                    <span class="help-inline" ng-show="frmAlunos.cep.$invalid && frmAlunos.cep.$touched">CEP é obrigatório</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="rua" class="col-sm-3 control-label">Rua</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="rua" name="rua" placeholder="Rua" value="{{rua}}" maxlength="120"
	                                        ng-model="aluno.rua" ng-required="true">
	                                    <span class="help-inline" ng-show="frmAlunos.rua.$invalid && frmAlunos.rua.$touched">Rua é obrigatório</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="numero_endereco" class="col-sm-3 control-label">Número</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="numero_endereco" name="numero_endereco" placeholder="Número" numbers-only="numbers-only" value="{{numero_endereco}}"
	                                        ng-model="aluno.numero_endereco" ng-required="true">
	                                    <span class="help-inline"
	                                        ng-show="frmAlunos.numero_endereco.$invalid && frmAlunos.numero_endereco.$touched">Número é obrigatório</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="complemento" class="col-sm-3 control-label">Complemento</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="complemento" name="complemento" placeholder="Complemento" value="{{complemento}}" maxlength="50" ng-model="aluno.complemento">
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="bairro" class="col-sm-3 control-label">Bairro</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro" value="{{bairro}}" maxlength="100"
	                                        ng-model="aluno.bairro" ng-required="true">
	                                    <span class="help-inline" ng-show="frmAlunos.bairro.$invalid && frmAlunos.bairro.$touched">Bairro é obrigatório</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="cidade" class="col-sm-3 control-label">Cidade</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" value="{{cidade}}" maxlength="100"
	                                        ng-model="aluno.cidade" ng-required="true">
	                                    <span class="help-inline" ng-show="frmAlunos.cidade.$invalid && frmAlunos.cidade.$touched">Cidade é obrigatório</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="estado" class="col-sm-3 control-label">Estado</label>
	                                    <div class="col-sm-9">
	                                        <!-- <input type="email" class="form-control" id="email" name="email" placeholder="Endereço de e-mail" value="{{email}}"
	                                        ng-model="aluno.email" ng-required="true"> -->
	                                         <select id="estado" name="estado" ng-model="aluno.estado" ng-required="true">
												<option value="AC" selected>Acre</option>
												<option value="AL">Alagoas</option>
												<option value="AP">Amapá</option>
												<option value="AM">Amazonas</option>
												<option value="BA">Bahia</option>
												<option value="CE">Ceará</option>
												<option value="DF">Distrito Federal</option>
												<option value="ES">Espírito Santo</option>
												<option value="GO">Goiás</option>
												<option value="MA">Maranhão</option>
												<option value="MT">Mato Grosso</option>
												<option value="MS">Mato Grosso do Sul</option>
												<option value="MG">Minas Gerais</option>
												<option value="PA">Pará</option>
												<option value="PB">Paraíba</option>
												<option value="PR">Paraná</option>
												<option value="PE">Pernambuco</option>
												<option value="PI">Piauí</option>
												<option value="RJ">Rio de Janeiro</option>
												<option value="RN">Rio Grande do Norte</option>
												<option value="RS">Rio Grande do Sul</option>
												<option value="RO">Rondônia</option>
												<option value="RR">Roraima</option>
												<option value="SC">Santa Catarina</option>
												<option value="SP">São Paulo</option>
												<option value="SE">Sergipe</option>
												<option value="TO">Tocantins</option>
											</select> 
	                                    </div>
	                                </div>

	                                <h3>Dados da Mãe</h3>

									<div class="form-group">
	                                    <label for="nome_mae" class="col-sm-3 control-label">Nome da mãe</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="nome_mae" name="nome_mae" placeholder="Nome da mãe" value="{{nome_mae}}" maxlength="100"
	                                        ng-model="aluno.nome_mae" ng-required="true">
	                                        <span class="help-inline"
	                                        ng-show="frmAlunos.nome_mae.$invalid && frmAlunos.nome_mae.$touched">Nome da mãe é obrigatório.</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="cpf" class="col-sm-3 control-label">CPF</label>
	                                    <div class="col-sm-9">
	                                        <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" ng-cpf value="{{cpf}}" maxlength="11"
	                                        ng-model="aluno.cpf" ng-required="true">
	                                        <span class="help-inline" ng-show="frmAlunos.cpf.$invalid && frmAlunos.cpf.$touched">Preencha um CPF válido.</span>
	                                    </div>
	                                </div>

	                                <div class="form-group">
	                                    <label for="venc" class="col-sm-3 control-label">Dia de vencimento</label>
	                                    <div class="col-sm-9">
	                                    	<select id="venc" name="venc" ng-model="aluno.venc" ng-required="true">
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="27">28</option>
                                            </select>
	                                    </div>
	                                </div>

	                            </form>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="frmAlunos.$invalid">Salvar alterações</button>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	
	        <!-- Carrega bibliotecas Javascripts (AngularJS, JQuery, Bootstrap) -->
	        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
	        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	        
	        <!-- AngularJS Application Scripts -->
	        <script src="<?= asset('app/app.js') ?>"></script>
	        <script src="<?= asset('app/controllers/alunos.js') ?>"></script>
	        <!-- Utilidades para validação de CPF e CEP -->
			<script src="<?= asset('js/autocep.js') ?>"></script>
			<script src="<?= asset('js/bower_components/cpf_cnpj/build/cpf.js') ?>"></script>
			<script src="<?= asset('js/bower_components/ng-cpf-cnpj/lib/ngCpfCnpj.js') ?>"></script>

	    </body>
	</html>