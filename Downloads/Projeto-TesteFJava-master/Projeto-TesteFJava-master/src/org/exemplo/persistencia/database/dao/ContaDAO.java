package org.exemplo.persistencia.database.dao;

import java.util.List;


import javax.persistence.criteria.CriteriaBuilder;
import javax.persistence.criteria.CriteriaQuery;
import javax.persistence.criteria.Root;

import org.exemplo.persistencia.database.db.IConnection;
import org.exemplo.persistencia.database.model.Conta;
import org.hibernate.Session;

public class ContaDAO implements IEntityDAO<Conta> {

    private IConnection conn;

    public ContaDAO(IConnection conn) {
        this.conn = conn;
    }

    @Override
    public void save(Conta conta) {
        Session session = conn.getSessionFactory().openSession();
        session.beginTransaction();
        session.persist(conta);
        session.getTransaction().commit();
        session.close();
    }

    @Override
    public Conta findById(Integer id) {
        Session session = conn.getSessionFactory().openSession();
        return session.find(Conta.class, id);
    }

    @Override
    public void update(Conta conta) {
        Session session = conn.getSessionFactory().openSession();
        session.beginTransaction();
        session.merge(conta);
        session.getTransaction().commit();
        session.close();
    }

    @Override
    public void delete(Conta conta) {
        Session session = conn.getSessionFactory().openSession();
        session.beginTransaction();
        session.delete(conta);
        session.getTransaction().commit();
        session.close();
    }

    @Override
    public List<Conta> findAll() {
        Session session = conn.getSessionFactory().openSession();
        CriteriaBuilder builder = session.getCriteriaBuilder();
        CriteriaQuery<Conta> query = builder.createQuery(Conta.class);
        Root<Conta> root = query.from(Conta.class);
        query.select(root);
        return session.createQuery(query).getResultList();
    }

    public Conta findByCpf(String cpf) {
        return null; // Implemente a lógica para encontrar uma conta pelo CPF
    }
}
