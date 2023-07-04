package org.exemplo.persistencia.database.application;

import org.exemplo.persistencia.database.dao.ContaDAO;

import org.exemplo.persistencia.database.dao.IEntityDAO;

import java.math.BigDecimal;
import java.time.LocalDateTime;
import java.util.List;
import java.util.Random;
import java.util.Scanner;

import org.exemplo.persistencia.database.dao.ClienteDAO;
import org.exemplo.persistencia.database.db.ConexaoBancoHibernate;
import org.exemplo.persistencia.database.enumerator.TipoConta;
import org.exemplo.persistencia.database.model.Conta;
import org.exemplo.persistencia.database.model.Transacao;
import org.exemplo.persistencia.database.dao.TransacaoDAO;
import org.exemplo.persistencia.database.enumerator.TipoTransacao;
import org.exemplo.persistencia.database.model.Cliente;

public class Application {

	public static void main(String[] args) {
		
		
		Scanner scanner = new Scanner(System.in);

		while (true) {
			System.out.println("Bem-vindo ao banco! O que você gostaria de fazer?");
			System.out.println("1. Cadastrar novo cliente");
			System.out.println("2. Selecionar cliente existente");
			System.out.println("3. Listar clientes");
			System.out.println("4. Remover cliente");
			System.out.println("0. Sair");

			int opcao = scanner.nextInt();
			scanner.nextLine();

			switch (opcao) {
			case 1:
				System.out.println("Digite o nome do cliente:");
				String nome = scanner.nextLine();
				System.out.println("Digite o CPF do cliente:");
				String cpf = scanner.nextLine();
				
				try {
				
				Cliente cliente = new Cliente(cpf, nome);
				cliente.setCpf(cpf);
				cliente.setNome(nome);
				
				IEntityDAO<Cliente> Client = new ClienteDAO(new ConexaoBancoHibernate());
				
				Client.save(cliente); 
				System.out.println("Cliente criado com sucesso.");
				} catch (Exception e) {
					System.out.println("Ocorreu um erro ao criar o cliente:" + e.getMessage());
					e.printStackTrace();
				}
				break;

			case 2:
				
				try {
				
				IEntityDAO<Cliente> Client = new ClienteDAO(new ConexaoBancoHibernate());
				
				System.out.println("Digite o CPF do cliente:");
				cpf = scanner.nextLine();
				
				Cliente cliente = Client.findByCpf(cpf);
				
				if (cliente != null) {
					System.out.println("Cliente encontrado");
					
					System.out.println("Cliente selecionado: " + cliente.getNome());
					System.out.println("\nO que você gostaria de fazer?\n");
					System.out.println("1. Criar nova conta");
					System.out.println("2. Ver informações das contas");
					System.out.println("3. Realizar Deposito");
					System.out.println("4. Realizar Saque");
					System.out.println("5. Realizar Transferencia");
					System.out.println("6. Imprimir extrato");
					System.out.println("7. Remover conta");
					System.out.println("8. Balanço entre contas");
					
					opcao = scanner.nextInt();
					scanner.nextLine();

					switch (opcao) {
					case 1:
						System.out.println("Que tipo de conta deseja criar?♫");
						System.out.println("1. Conta Poupança");
						System.out.println("2. Conta Corrente");
						
						opcao = scanner.nextInt();
						scanner.nextLine();
						
						switch (opcao) {
						case 1:
						
							try {
								IEntityDAO<Conta> Cont = new ContaDAO(new ConexaoBancoHibernate());
						      
								
								Conta conta = new Conta();
								
								conta.setDataAbertura(LocalDateTime.now());
								conta.setStatus(true);
								conta.setDataAbertura(LocalDateTime.now());
								
												
								conta.setSaldo(BigDecimal.ZERO);
								conta.setStatus(true);
								conta.setTipoConta(TipoConta.POUPANCA);
								
								conta.setCliente(cliente);
								
								
								Cont.save(conta);
								
								System.out.println("Conta Poupança criada com sucesso!");
								
							} catch (Exception e) {
								System.out.println("Ocorreu um erro ao criar a conta:" + e.getMessage());
								e.printStackTrace();
							}
						
						break;
						case 2:
					   
	                    try {
								
	                    	IEntityDAO<Conta> Cont = new ContaDAO(new ConexaoBancoHibernate());
								Conta conta = new Conta();
								conta.setSaldo(BigDecimal.ZERO);
								conta.setDataAbertura(LocalDateTime.now());
								conta.setStatus(true);
								conta.setTipoConta(TipoConta.CORRENTE);
				
								
								conta.setCliente(cliente);
								Cont.save(conta);
								
								System.out.println("Conta Corrente criada com sucesso!");

							} catch (Exception e) {
								System.out.println("Ocorreu um erro ao criar a conta:" + e.getMessage());
								e.printStackTrace();
							}
						break;
						default:
							System.out.println("Opção inválida");
							break;
						}
						
					case 2:
						
						try {
							
							
							if (cliente.getContas().isEmpty()) {
								System.out.println("Cliente não tem contas");
							} else {
								
								
								System.out.println("Contas do cliente:");
								for (Conta conta : cliente.getContas()) {
									System.out.println("Nº da Conta: " + conta.getNumeroconta());
									System.out.println("Saldo: " + conta.getSaldo());
									System.out.println("Tipo da Conta: " + conta.getTipoConta());
									System.out.println("Status: " + conta.isStatus());
									System.out.println("D. Abertura: " + conta.getDataAbertura());
									
								}
							
							}
						} catch (Exception e) {
							System.out.println("Ocorreu um erro ao listar as contas do cliente: " + e.getMessage());
							e.printStackTrace();
						}
						
						break;
					case 3:
						 
						try {
							
								List<Conta> contas = cliente.getContas();
								
								if (contas.isEmpty()) {
									System.out.println("O cliente selecionado não possui contas.");
								} else {
									System.out.println("Lista de contas do cliente:");
									for (Conta conta : contas) {
										System.out.println("Nº da Conta: " + conta.getNumeroconta());
										System.out.println("Saldo: " + conta.getSaldo());
										System.out.println("Tipo da Conta: " + conta.getTipoConta());
										System.out.println("Status: " + conta.isStatus());
										System.out.println("D. Abertura: " + conta.getDataAbertura());
										
									}
									
									System.out.println("Degite o número da conta que deseja realisar o depósito:");
									int numeroConta = scanner.nextInt();
									scanner.nextLine();
									
									Conta contaSelecionada = null;
									for (Conta conta : contas) {
										if (conta.getNumeroconta() == numeroConta) {
											contaSelecionada = conta;
											break;
										}
									}
									if (contaSelecionada != null) {
										System.out.println("Digite o valor do depósito:");
										double quantia = scanner.nextDouble();
										scanner.nextLine();
										
										contaSelecionada.depositar(new BigDecimal(quantia));
										
							      		IEntityDAO<Transacao> transacaoDAO = new TransacaoDAO(new ConexaoBancoHibernate());
										Transacao transacao = new Transacao(BigDecimal.valueOf(quantia), TipoTransacao.CREDITO, LocalDateTime.now());
                                        transacao.setConta(contaSelecionada);
                                        
                                        IEntityDAO<Conta> Cont = new ContaDAO(new ConexaoBancoHibernate());
										Cont.update(contaSelecionada);
							
										System.out.println("Depósito realizado com sucesso!");
									} else {
										System.out.println("Conta não encontrada;");
									}
								}
						} catch (Exception e) {
							System.out.println("Ocorreu um erro ao realizar depósito: " + e.getMessage());
							e.printStackTrace();
						}
						
						break;
					case 4:
						
						try {
							
								List<Conta> contas = cliente.getContas();
								
								if (contas.isEmpty()) {
									System.out.println("O cliente selecionado não possui contas");
								} else {
									System.out.println("lista de contas do cliente: ");
									for (Conta conta : contas) {
										System.out.println("Nº da Conta: " + conta.getNumeroconta());
										System.out.println("Saldo: " + conta.getSaldo());
										System.out.println("Tipo da Conta: " + conta.getTipoConta());
										System.out.println("Status: " + conta.isStatus());
										System.out.println("D. de Abertura: " + conta.getDataAbertura());
										
									}
									
									System.out.println("Digite o numero da conta que deseja sacar:");
									int numeroConta = scanner.nextInt();
									scanner.nextLine();
									
									Conta contaSelecionada = null;
									for (Conta conta : contas) {
										if (conta.getNumeroconta() == numeroConta) {
											contaSelecionada = conta;
											break;
										}
									}
									if (contaSelecionada != null) {
										System.out.println("Digite o valor do saque:");
										double quantia = scanner.nextDouble();
										scanner.nextLine();
										contaSelecionada.sacar(new BigDecimal(quantia));
										
										IEntityDAO<Transacao> transacaoDAO = new TransacaoDAO(new ConexaoBancoHibernate());
										Transacao transacao = new Transacao(BigDecimal.valueOf(quantia), TipoTransacao.CREDITO, LocalDateTime.now());
										transacao.setConta(contaSelecionada);
										
										IEntityDAO<Transacao> TransacaoDAO = new TransacaoDAO(new ConexaoBancoHibernate()); 
										Transacao transacao1 = new Transacao(BigDecimal.valueOf(quantia), TipoTransacao.CREDITO, LocalDateTime.now());
										transacao1.setConta(contaSelecionada);
										
										IEntityDAO<Conta> Cont = new ContaDAO(new ConexaoBancoHibernate());
										Cont.update(contaSelecionada);
										TransacaoDAO.save(transacao1);

										

										
										System.out.println("Saque realizado com sucesso");
									} else {
										System.out.println("Conta não encontrada.");
									}
								}
		
						} catch (Exception e) {
							System.out.println("Ocorreu um erro ao realizar o saque: " + e.getMessage());
							e.printStackTrace();
						}
						
						break;
					case 5:
						try {
							
								List<Conta> contas = cliente.getContas();
								
								if (contas.isEmpty()) {
									System.out.println("O cliente selecionado não possui contas");
								} else {
									System.out.println("lista de contas do cliente: ");
									for (Conta conta : contas) {
										System.out.println("Nº da Conta: " + conta.getNumeroconta());
										System.out.println("Saldo: " + conta.getSaldo());
										System.out.println("Tipo da Conta: " + conta.getTipoConta());
										System.out.println("Status: " + conta.isStatus());
										System.out.println("D. de Abertura: " + conta.getDataAbertura());
										
									}
									
									IEntityDAO<Conta> Cont = new ContaDAO(new ConexaoBancoHibernate());
									System.out.println("Digite o número da conta de origem: ");
							        int numeroContaOrigem = scanner.nextInt();
							        Conta contaOrigem = Cont.findById(numeroContaOrigem);

							        System.out.println("Digite o número da conta de destino: ");
							        int numeroContaDestino = scanner.nextInt();
							        Conta contaDestino = Cont.findById(numeroContaDestino);
							        
							        if (contaOrigem != null || contaDestino != null) {
							        	System.out.println("Digite o valor da transferencia:");
							        	double quantia = scanner.nextDouble();
							        	scanner.nextLine();
							        	
							        	contaOrigem.transferir(contaDestino, new BigDecimal(quantia));
							        	
							        	IEntityDAO<Transacao> TransacaoDAO = new TransacaoDAO(new ConexaoBancoHibernate()); 
										Transacao transacao = new Transacao(BigDecimal.valueOf(quantia), TipoTransacao.CREDITO, LocalDateTime.now());
										transacao.setConta(contaOrigem);
							        	transacao.setConta(contaDestino);
							        	
							        	Cont.update(contaOrigem);
							        	Cont.update(contaDestino);
							        	TransacaoDAO.save(transacao);
							        	
							        	System.out.println("Transferencia realizada com sucesso");
							        	
							        } else {
							        	System.out.println("Conta origem ou estino não encontrada.");
							        }
								}	
								
						} catch (Exception e) {
							System.out.println("Ocorreu um erro ao realizar a transferencia: " + e.getMessage());
							e.printStackTrace();
						}
						break;
					case 6:
						
						try {
							
								List<Conta> contas = cliente.getContas();
								
								if (contas.isEmpty()) {
									System.out.println("O cliente selecionado não possui contas");
								} else {
									System.out.println("lista de contas do cliente: ");
									for (Conta conta : contas) {
										System.out.println("Nº da Conta: " + conta.getNumeroconta());
										System.out.println("Saldo: " + conta.getSaldo());
										System.out.println("Tipo da Conta: " + conta.getTipoConta());
										System.out.println("Status: " + conta.isStatus());
										System.out.println("D. Abertura: " + conta.getDataAbertura());
										
									}
								}
								System.out.println("Digite o numero da conta:");
								int numeroConta = scanner.nextInt();
								scanner.nextLine();
								
								IEntityDAO<Conta> Cont = new ContaDAO(new ConexaoBancoHibernate());
								Conta conta = Cont.findById(numeroConta);
								
								if (conta != null && conta.getCliente().equals(cliente)) {
									
									List<Transacao> transacoes = conta.getTransacoes();
									if (transacoes.isEmpty()) {
										System.out.println("Não há transações registradas para esta conta");
									} else {
										System.out.println("Extrato da conta:"); //impimir extrato
										
										for (Transacao transacao : transacoes) {
											System.out.println("ID: " + transacao.getId());
											System.out.println("Data: " + transacao.getData());
											System.out.println("Valor: " + transacao.getValor());
											System.out.println("Tipo :" + transacao.getTipo());
											
										}
									}
								} else {
									System.out.println("Conta não encontrada ou não pertence ao cliente");
								}							
						} catch (Exception e ) {
							System.out.println("Ocorreu um erro ao imprimir o extrato: " + e.getMessage()); 
							e.printStackTrace();
						}
						
					     break;
					case 7:
						
						try {
							
							
								List<Conta> contas = cliente.getContas();
								
								if (contas.isEmpty()) {
									System.out.println("O cliente selecionado não possui contas");
								} else {
									System.out.println("lista de contas do cliente: ");
									for (Conta conta : contas) {
										System.out.println("Nº da Conta: " + conta.getNumeroconta());
										System.out.println("Saldo: " + conta.getSaldo());
										System.out.println("Tipo da Conta: " + conta.getTipoConta());
										System.out.println("Status: " + conta.isStatus());
										System.out.println("D.  Abertura: " + conta.getDataAbertura());
										
									}
								}
								System.out.println("Digite o numero da conta que deseja remover:");
								int numeroConta = scanner.nextInt();
								scanner.nextLine();
								
								IEntityDAO<Conta> Cont = new ContaDAO(new ConexaoBancoHibernate());
								Conta conta = Cont.findById(numeroConta);
								
								if (conta != null ) {
									
									Client.update(cliente);
									Cont.update(conta);
									System.out.println("Conta removida com sucesso.");
								} else {
									System.out.println("Conta não encontrada ou não pertence ao cliente.");
								}
	
						} catch (Exception e) {
							System.out.println("Ocorreu um erro ao remover a conta: " + e.getMessage());
							e.printStackTrace();
						}
						
						break;
					default:
						System.out.println("Opção inválida");
						break;
					case 8:
						
	                    try {
	                    	
	                    		
	                    		List<Conta> contas = cliente.getContas();
	                    		BigDecimal saldoTotal = BigDecimal.ZERO;
	                    		
	                    		for (Conta conta : contas) {
	                    			saldoTotal = saldoTotal.add(conta.getSaldo());
	                    		}
	                    		System.out.println("Balaço total entre as contas: " + saldoTotal);     	//balanço
	                    } catch (Exception e) {
	                    	System.out.println("Ocorreu um erro ao calcular o balanço: " + e.getMessage()); //balanço
	                    	e.printStackTrace();
	                    }
						
						break;
					}
					
				} else {
					System.out.println("Cliente não encontrado");
				}
				
				} catch (Exception e) {
					System.out.println("Ocorreu um erro ao buscar o cliente:" + e.getMessage());
					e.printStackTrace();
				}
				

				
				break;
			case 3:
				
				IEntityDAO<Cliente> Client = new ClienteDAO(new ConexaoBancoHibernate());
				
				List<Cliente> clientes = Client.findAll();
				
				for (Cliente cliente : clientes) {
					System.out.println("Nome:" + cliente.getNome());
					System.out.println("CPF:" + cliente.getCpf());
					
				}
				
				break;
			case 4:
				
				try {
					IEntityDAO<Cliente> Client2 = new ClienteDAO(new ConexaoBancoHibernate());
					
					List<Cliente> clientes1 = Client2.findAll();
					
					System.out.println("Lista de Clientes:");
					for (Cliente cliente : clientes1) {
						System.out.println("ID: " + cliente.getId());
						System.out.println("Nome: " + cliente.getNome());
						System.out.println("CPF: " + cliente.getCpf());
						
					}
					
					System.out.println("Digite o ID do cliente que deseja excluir:");
				  cpf = scanner.next();
					scanner.nextLine();
					
					Cliente cliente = Client2.findByCpf(cpf);
					
					if (cliente != null) {
						Client2.delete(cliente);
						System.out.println("Cliente excluído com sucesso");
					} else {
						System.out.println("Cliente não encontrado.");
					}
					
				} catch (Exception e) {
					System.out.println("Ocorreu um erro ao excluir o cliente: " + e.getMessage());
					e.printStackTrace();
				}
				
				break;
			case 5:
				System.out.println("Até logo!");
				System.exit(0);

			default:
				System.out.println("Opção inválida");
				break;
			}
		}
		
	}
}