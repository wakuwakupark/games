package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;
import java.util.List;


/**
 * The persistent class for the menber_types database table.
 * 
 */
@Entity
@Table(name="member_types")
@NamedQuery(name="MemberType.findAll", query="SELECT m FROM MemberType m")
public class MemberType implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	private String title;

	//bi-directional many-to-one association to Administrator
	@OneToMany(mappedBy="memberType", cascade=CascadeType.ALL)
	private List<Administrator> administrators;

	//bi-directional many-to-one association to Master
	@OneToMany(mappedBy="memberType", cascade=CascadeType.ALL)
	private List<Master> masters;

	//bi-directional many-to-one association to User
	@OneToMany(mappedBy="memberType", cascade=CascadeType.ALL)
	private List<User> users;

	public MemberType() {
	}

	public int getId() {
		return this.id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getTitle() {
		return this.title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public List<Administrator> getAdministrators() {
		return this.administrators;
	}

	public void setAdministrators(List<Administrator> administrators) {
		this.administrators = administrators;
	}

	public Administrator addAdministrator(Administrator administrator) {
		getAdministrators().add(administrator);
		administrator.setMenberType(this);

		return administrator;
	}

	public Administrator removeAdministrator(Administrator administrator) {
		getAdministrators().remove(administrator);
		administrator.setMenberType(null);

		return administrator;
	}

	public List<Master> getMasters() {
		return this.masters;
	}

	public void setMasters(List<Master> masters) {
		this.masters = masters;
	}

	public Master addMaster(Master master) {
		getMasters().add(master);
		master.setMenberType(this);

		return master;
	}

	public Master removeMaster(Master master) {
		getMasters().remove(master);
		master.setMenberType(null);

		return master;
	}

	public List<User> getUsers() {
		return this.users;
	}

	public void setUsers(List<User> users) {
		this.users = users;
	}

	public User addUser(User user) {
		getUsers().add(user);
		user.setMemberType(this);

		return user;
	}

	public User removeUser(User user) {
		getUsers().remove(user);
		user.setMemberType(null);

		return user;
	}

	@Override
	public int hashCode() {
		final int prime = 31;
		int result = 1;
		result = prime * result + ((id == null) ? 0 : id.hashCode());
		return result;
	}

	@Override
	public boolean equals(Object obj) {
		if (this == obj)
			return true;
		if (obj == null)
			return false;
		if (getClass() != obj.getClass())
			return false;
		MemberType other = (MemberType) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}
}