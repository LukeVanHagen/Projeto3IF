package org.exemplo.persistencia.database.model;

import java.util.ArrayList;
import java.util.List;
import java.util.Objects;
import java.util.Random;

import javax.persistence.CascadeType;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.GenerationType;
import javax.persistence.Id;
import javax.persistence.OneToMany;
import javax.persistence.Table;

@Entity
@Table(name = "cliente")
public class Cliente {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Integer id;

    @Column(name = "cpf")
    private String cpf;

    @Column(name = "nome")
    private String nome;

    @OneToMany(mappedBy = "cliente", cascade = CascadeType.ALL)
    private List<Conta> contas;

    public Cliente() {
        
    }

    public Cliente(String cpf, String nome) {
        this.cpf = cpf;
        this.nome = nome;
        contas = new ArrayList<>();
    }
    public Cliente(Integer id) {
    	//TODO Auto-generated constructor stub
    }
    

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getCpf() {
        return cpf;
    }

    public void setCpf(String cpf) {
        this.cpf = cpf;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public List<Conta> getContas() {
        return contas;
    }

    public void setContas(List<Conta> contas) {
        this.contas = contas;
    }

    public void gerarIdAleatorio() {
        Random random = new Random();
        this.id = random.nextInt(1000);
    }

    @Override
    public String toString() {
        return "Cliente [id=" + id + ", cpf=" + cpf + ", nome=" + nome + ", contas=" + contas + "]";
    }

    @Override
    public int hashCode() {
        return Objects.hash(id);
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj)
            return true;
        if (obj == null || getClass() != obj.getClass())
            return false;
        Cliente other = (Cliente) obj;
        return Objects.equals(id, other.id);
    }
}
