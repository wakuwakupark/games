package com.crawler.model;

import java.io.Serializable;
import javax.persistence.*;


/**
 * The persistent class for the masters database table.
 * 
 */
@Entity
@Table(name="masters")
@NamedQuery(name="Master.findAll", query="SELECT m FROM Master m")
public class Master implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	private Integer id;

	private String email;

	private String password;

	//bi-directional many-to-one association to MenberType
	@ManyToOne
	@JoinColumn(name="member_type_id")
	private MemberType memberType;

	public Master() {
	}

	public Integer getId() {
		return this.id;
	}

	public void setId(Integer id) {
		this.id = id;
	}

	public String getEmail() {
		return this.email;
	}

	public void setEmail(String email) {
		this.email = email;
	}

	public String getPassword() {
		return this.password;
	}

	public void setPassword(String password) {
		this.password = password;
	}

	public MemberType getMenberType() {
		return this.memberType;
	}

	public void setMenberType(MemberType memberType) {
		this.memberType = memberType;
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
		Master other = (Master) obj;
		if (id == null) {
			if (other.id != null)
				return false;
		} else if (!id.equals(other.id))
			return false;
		return true;
	}
	
}